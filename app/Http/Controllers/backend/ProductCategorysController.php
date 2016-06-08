<?php namespace App\Http\Controllers\backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Config;
use App\ProductCategory;
use Datatable;

class ProductCategorysController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('backend.productcategorys.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('backend.productcategorys.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$productCategory = ProductCategory::create($request->all());
		return redirect()->route('productcategorys.index')->with('message','Success..! Bạn đã thêm mới thành công..!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$productCategory = ProductCategory::findOrFail($id);
		$optionActive = Config::where('group','active')->lists('title','value');
		return view('backend.productcategorys.show',compact('productCategory','optionActive'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$productCategory = ProductCategory::findOrFail($id);
		return view('backend.productcategorys.edit',compact('productCategory'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$productCategory = ProductCategory::findOrFail($id);
		$productCategory->update($request->all());
		return redirect()->route('productcategorys.index')->with('message','Success..! Bạn đã cập nhật thành công..!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$productCategory = ProductCategory::findOrFail($id);
		$productCategory->delete();
		return redirect()->route('productcategorys.index')->with('message','Success..! Bạn đã xóa thành công..!');
	}

	public function data()
	{

		$productCategory = ProductCategory::all();
		return Datatable::collection($productCategory)
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
			return "<a href=" . route('productcategorys.show',$model->id) . "><i class='glyphicon glyphicon-eye-open'></i></a> " . 
					"<a href=" . route('productcategorys.edit',$model->id) . "><i class='fa fa-edit'></i></a> " .
					"<a onclick=\"return confirm('Are you sure you want to delete this item?');\" href=" . route('productcategorys.destroy',$model->id) . "><i class='glyphicon glyphicon-trash'></i></a>";
		})
		->make();
	}

}
