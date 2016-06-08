<?php namespace App\Http\Requests\backend;

use App\Http\Requests\Request;

class ArticlesFormRequest extends Request {

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
		if($this->method() == 'PUT')
		{
			return [
				'title' => "required|min:4|max:255",
				'tags' => "required|min:4|max:255",
				'introduction' => "required|min:4|max:255",
				'content' => "required|min:4",
				'image'=> 'image|mimes:jpeg,jpg,gif,bmp,png',
			];
		}
		else
		{

			return [
				'title' => "required|min:4|max:255",
				'tags' => "required|min:4|max:255",
				'introduction' => "required|min:4|max:255",
				'content' => "required|min:4",
				'image'=> 'required|image|mimes:jpeg,jpg,gif,bmp,png',
			];
		}
	}

}
