<?php namespace App\Http\Controllers\backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\ArticleCategorysFormRequest;
use Illuminate\Http\Request;
use App\Config;
use App\ArticleCategory;
use Datatable;

class ArticleCategorysController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('backend.articlecategorys.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('backend.articlecategorys.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ArticleCategorysFormRequest $request)
	{
		$articleCategory = ArticleCategory::create($request->all());
		return redirect()->route('articlecategorys.index')->with('message','Success..! Bạn đã thêm mới thành công..!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$articleCategory = ArticleCategory::findOrFail($id);
		$optionActive = Config::where('group','active')->lists('title','value');
		return view('backend.articlecategorys.show',compact('articleCategory','optionActive'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$articleCategory = ArticleCategory::findOrFail($id);
		return view('backend.articlecategorys.edit',compact('articleCategory'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, ArticleCategorysFormRequest $request)
	{
		$articleCategory = ArticleCategory::findOrFail($id);
		$articleCategory->update($request->all());
		return redirect()->route('articlecategorys.index')->with('message','Success..! Bạn đã cập nhật thành công..!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$articleCategory = ArticleCategory::findOrFail($id);
		$articleCategory->delete();
		return redirect()->route('articlecategorys.index')->with('message','Success..! Bạn đã xóa thành công..!');
	}

	public function data()
	{

		$articleCategory = ArticleCategory::all();
		return Datatable::collection($articleCategory)
		->searchColumns('title','active')
		->orderColumns('title','updated_at')
		->showColumns('title')
		->addColumn('updated_at', function($model){
			return date('d-m-Y H:i:s',strtotime($model->updated_at));
		})
		->addColumn('active', function($model){
			$optionActive = Config::where('group','active')->lists('title','value');
			return $optionActive[$model->active];
		})
		->addColumn('Action', function($model){
			return "<a href=" . route('articlecategorys.show',$model->id) . "><i class='glyphicon glyphicon-eye-open'></i></a> " . 
					"<a href=" . route('articlecategorys.edit',$model->id) . "><i class='fa fa-edit'></i></a> " .
					"<a onclick=\"return confirm('Are you sure you want to delete this item?');\" href=" . route('articlecategorys.destroy',$model->id) . "><i class='glyphicon glyphicon-trash'></i></a>";
		})
		->make();
	}

}
