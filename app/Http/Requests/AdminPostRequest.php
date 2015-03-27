<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::user()->superuser;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'title'       => 'required|min:2|max:255',
            'content'     => 'required',
            'status'      => 'required',
            'image'       => 'image',
            'category_id' => 'required|array',
            'tags'        => 'array',
            'created_at'  => 'date',
		];
	}

}
