<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UsersFormRequest;
use Illuminate\Http\Request;
use Input;
use Image;
use File;
use App\Config;
use App\User;
use App\Role;

class UsersController extends Controller {

	

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

		$optionRole = Role::lists('title','id');
		$optionRole[null] = 'All';
		ksort($optionRole);
		$optionActive = Config::where('group','active')->lists('title','value');
		$optionActive[null] = 'All';
		ksort($optionActive);

		$keyword = (Input::has('keyword')) ? Input::get('keyword') : null;
		$role = (Input::has('role')) ? Input::get('role') : null;
		$active = (Input::has('active')) ? Input::get('active') : null;

		$query = User::query();
		if($keyword)
		{
			$query->where('name','LIKE','%' . $keyword . '%');
		}
		if($role)
		{
			$query->where('role',$role);
		}
		if($active)
		{
			$query->where('active',$active);
		}

		$users = $query->orderBy('id','DESC')->paginate('10');
		$users->setPath('');
		$users->appends(['keyword'=>$keyword,'role'=>$role,'active'=>$active]);
		return view('auth.users.index', compact(['users','optionRole','optionActive']));

		//
		//return (Request::is('admin/users')) ? '1' : '2' ;
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$optionRole = Role::lists('title','id');
		//$optionRole[null] = 'Choose:';
		//ksort($optionRole);
		//dd($optionRole);
		

		return view('auth.users.create', compact('optionRole'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UsersFormRequest $request)
	{

		$user = new User();
		$user->name = $request->name;
		$user->username = $request->username;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->role = $request->role;
		$user->active = $request->active;

		if($request->hasFile('image'))
		{
			$destinationPath = public_path('uploads/images/users/');
			$image = $request->file('image');
			$imageName = date('Y_m_d_H_i_s') . '_' .$image->getClientOriginalName();
			Image::make($image->getRealPath())->resize(100,100)->save($destinationPath . 'thumbs/' . $imageName);
			$image->move($destinationPath, $imageName);
			$user->image = $imageName;

		}

		$user->save();

		return redirect()->route('users.index')->with('message','Success..! Bạn đã thêm mới thành công..!');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);
		$optionRole = Role::lists('title','id');
		$optionActive = Config::where('group','active')->lists('title','value');
		return view('auth.users.show',compact('user','optionRole','optionActive'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);
		$optionRole = Role::lists('title','id');
		return view('auth.users.edit',compact('user','optionRole'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, UsersFormRequest $request)
	{
		$user = User::findOrFail($id);
		$user->name = $request->name;
		$user->role = $request->role;
		$user->active = $request->active;
		$password = $request->password;
		if(!empty($password))
		{
			$user->password = bcrypt($password);
		}
		if($request->hasFile('image'))
		{
			$destinationPath = public_path('uploads/images/users/');
			$oldImage = $destinationPath . $user->image;
			$oldThumbs = $destinationPath . 'thumbs/' . $user->image;

			if(File::isFile($oldImage))
			{
				File::delete($oldImage,$oldThumbs);
			}

			$image = $request->File('image');
			$imageName = date('Y_m_d_H_i_s') . '_' .$image->getClientOriginalName();
			Image::make($image->getRealPath())->resize(100,100)->save($destinationPath . 'thumbs/' . $imageName);
			$image->move($destinationPath,$imageName);
			$user->image = $imageName;
		}

		$user->save();

		return redirect()->route('users.index')->with('message','Success..! Bạn đã cập nhật thành công..!');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::findOrFail($id);
		$destinationPath = public_path('uploads/images/users/');
		$image = $destinationPath . $user->image;
		$thumbs = $destinationPath . 'thumbs/' . $user->image;
		if(File::isFile($image))
		{
			File::delete($image,$thumbs);
		}

		$user->delete();
		return redirect()->route('users.index')->with('message','Success..! Bạn đã xóa thành công..!');
	}

}
