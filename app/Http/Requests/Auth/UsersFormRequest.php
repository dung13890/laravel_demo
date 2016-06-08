<?php namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class UsersFormRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		if($this->method()=='PUT')
		{
			return [
				'name' => "required|min:4|max:255",
				'username' => "min:4|max:255|unique:users,username," . $this->id,
				'password' => 'confirmed|min:6',
				'password_confirmation' => 'min:6',
				'image'=> 'image|mimes:jpeg,jpg,gif,bmp,png',
			];
		}
		else{
			return [
				'name' => "required|min:4|max:255",
				'username' => "required|min:4|max:255|unique:users",
				'email' => "required|email|max:255|unique:users",
				'password' => 'required|confirmed|min:6',
				'password_confirmation' => 'required|min:6',
				'image'=> 'image|mimes:jpeg,jpg,gif,bmp,png',
				'role' => 'required',
			];
		}
	}

}
