<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\UsersFormRequest;
use App\User;
use App\Config;
use App\Role;
use Image;
use File;

class ProfileController extends Controller {

	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userId = $this->auth->user()->id;
		$user = User::find($userId);
		$optionRole = Role::lists('title','id');
		$optionActive = Config::where('group','active')->lists('title','value');
		return view('auth.profiles.index',compact('user','optionRole','optionActive'));
	}

	public function edit()
	{
		$userId = $this->auth->user()->id;
		$user = User::find($userId);
		$optionRole = Role::lists('title','id');
		return view('auth.profiles.edit',compact('user','optionRole'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UsersFormRequest $request)
	{
		
		//dd($request->all());

		$userId = $this->auth->user()->id;
		$user = User::find($userId);
		$user->name = $request->name;

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

		return redirect()->route('profile.index')->with('message','Success..! Bạn đã cập nhật thành công..!');
	}



}
