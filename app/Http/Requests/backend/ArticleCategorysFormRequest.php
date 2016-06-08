<?php namespace App\Http\Requests\backend;

use App\Http\Requests\Request;

class ArticleCategorysFormRequest extends Request {

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
			'title' => 'required|min:4|max:255'
		];
	}

	public function messages()
	{
		return [
	        'title.required' => 'Er, deo duoc de trong !',
	        'title.min' => 'Er, Deo duoc nhon hon so ky tu dau!',
	        //'email.unique' => 'Email already taken m8',
	    ];
	}

}
