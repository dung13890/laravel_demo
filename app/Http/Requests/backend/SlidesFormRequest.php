<?php namespace App\Http\Requests\backend;

use App\Http\Requests\Request;

class SlidesFormRequest extends Request {

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
		return [
			'title' => "required|min:4|max:255",
			'image'=> 'image|mimes:jpeg,jpg,gif,bmp,png',
		];
	}

}
