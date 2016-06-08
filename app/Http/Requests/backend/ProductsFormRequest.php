<?php namespace App\Http\Requests\backend;

use App\Http\Requests\Request;

class ProductsFormRequest extends Request {

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
				'code' => "required|min:4|max:255|unique:products,code," . $this->id,
				'title' => "required|min:4|max:255|unique:products,title," . $this->id,
				'tags' => "required|min:4|max:255",
				'content' => "required|min:4",
				'image'=> 'image|mimes:jpeg,jpg,gif,bmp,png',
			];
		}
		else
		{

			return [
				'code' => "required|min:4|max:255|unique:products",
				'title' => "required|min:4|max:255|unique:products",
				'tags' => "required|min:4|max:255",
				'content' => "required|min:4",
				'image'=> 'required|image|mimes:jpeg,jpg,gif,bmp,png',
			];
		}
	}

}
