<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RolesFormRequest;
use Illuminate\Http\Request;
use Input;
use App\Role;
use App\config;
use Datatable;

class RolesController extends Controller {

	
	public function __construct()
	{
		 $this->middleware('admin');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('auth.roles.index');
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('auth.roles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(RolesFormRequest $request)
	{
		//dd($request->all());
		$newroles = Role::create($request->all());
		return redirect()->route('roles.index')->with('message','Success..! Bạn đã thêm mới thành công..!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$role = Role::findOrFail($id);
		$optionActive = Config::where('group','active')->lists('title','value');
		return view('auth.roles.show',compact(['role','optionActive']));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$role = Role::findOrFail($id);
		return view('auth.roles.edit', compact('role'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, RolesFormRequest $request)
	{
		$role = Role::findOrFail($id);
		$role->update($request->all());
		return redirect()->route('roles.index')->with('message','Success..! Bạn đã cập nhật thành công..!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$role = Role::findOrFail($id);
		$role->delete();
		return redirect()->route('roles.index')->with('message','Success..! Bạn đã xoá thành công..!');
	}

	public function data()
	{
		
		$role = Role::all();
		return Datatable::collection($role)
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
			return "<a href=" . route('roles.show',$model->id) . "><i class='glyphicon glyphicon-eye-open'></i></a> " . 
					"<a href=" . route('roles.edit',$model->id) . "><i class='glyphicon glyphicon-pencil'></i></a> " .
					"<a onclick=\"return confirm('Are you sure you want to delete this item?');\" href=" . route('roles.destroy',$model->id) . "><i class='glyphicon glyphicon-trash'></i></a>";
		})
		->make();

	}

}
