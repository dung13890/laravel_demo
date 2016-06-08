<?php namespace App\Http\Controllers\backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\slidesFormRequest;
use Illuminate\Http\Request;
use App\Slide;
use App\Config;
use Image;
use File;
use Datatable;

class SlidesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('backend.slides.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('backend.slides.create');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(slidesFormRequest $request)
	{
		$slide = new Slide();
		$slide->title = $request->title;
		$slide->link = $request->link;
		$slide->active = $request->active;


		if($request->hasFile('image'))
		{
			$destinationPath = public_path('uploads/images/slides/');
			$image = $request->file('image');
			$imageName = date('Y_m_d_H_i_s') . '_' .$image->getClientOriginalName();
			Image::make($image->getRealPath())->resize(100,100)->save($destinationPath . 'thumbs/' . $imageName);
			Image::make($image->getRealPath())->resize(836,350)->save($destinationPath . $imageName);
			//$image->move($destinationPath, $imageName);
			$slide->image = $imageName;
		}

		$slide->save();

		return redirect()->route('slides.index')->with('message','Success..! Bạn đã thêm mới thành công..!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$optionActive = Config::where('group','active')->lists('title','id');
		$slide = Slide::findOrFail($id);

		return view('backend.slides.show',compact('slide','optionActive'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$slide = Slide::findOrFail($id);

		return view('backend.slides.edit',compact('slide'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, slidesFormRequest $request)
	{
		$slide = Slide::findOrFail($id);
		$slide->title = $request->title;
		$slide->link = $request->link;
		$slide->active = $request->active;

		if($request->hasFile('image'))
		{
			$destinationPath = public_path('uploads/images/slides/');
			$oldImage = $destinationPath . $slide->image;
			$oldThumbs = $destinationPath . 'thumbs/' . $slide->image;

			if(File::isFile($oldImage))
			{
				File::delete($oldImage,$oldThumbs);
			}

			$image = $request->file('image');
			$imageName = date('Y_m_d_H_i_s') . '_' .$image->getClientOriginalName();
			Image::make($image->getRealPath())->resize(100,100)->save($destinationPath . 'thumbs/' . $imageName);
			Image::make($image->getRealPath())->resize(836,350)->save($destinationPath . $imageName);
			//$image->move($destinationPath, $imageName);
			$slide->image = $imageName;
		}

		$slide->save();

		return redirect()->route('slides.index')->with('message','Success..! Bạn đã cập nhật thành công..!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$slide = Slide::findOrFail($id);
		$destinationPath = public_path('uploads/images/slides/');
		$oldImage = $destinationPath . $slide->image;
		$oldThumbs = $destinationPath . 'thumbs/' . $slide->image;

		if(File::isFile($oldImage))
		{
			File::delete($oldImage,$oldThumbs);
		}
		$slide->delete();
		return redirect()->route('slides.index')->with('message','Success..! Bạn đã xóa thành công..!');
	}

	public function data()
	{

		$slide = Slide::all();
		return Datatable::collection($slide)
		->searchColumns('title','image','active')
		->orderColumns('title','active')
		->addColumn('title', function($model){
			return str_limit($model->title,50,'...');
		})
		->addColumn('image', function($model){
			return "<img class='img-thumbnail' alt='". $model->title . "' src='" .url() . '/uploads/images/slides/thumbs/' . $model->image . "' >";
		})
		->addColumn('active', function($model){
			$optionActive = Config::where('group','active')->lists('title','value');
			return $optionActive[$model->active];
		})
		->addColumn('Action', function($model){
			return "<a href=" . route('slides.show',$model->id) . "><i class='glyphicon glyphicon-eye-open'></i></a> " . 
					"<a href=" . route('slides.edit',$model->id) . "><i class='fa fa-edit'></i></a> " .
					"<a onclick=\"return confirm('Are you sure you want to delete this item?');\" href=" . route('slides.destroy',$model->id) . "><i class='glyphicon glyphicon-trash'></i></a>";
		})
		->make();
	}

}
