<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class AdminStorePostRequest extends Request
{
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
            'lang'        => 'max:10',
            'image'       => 'image',
            'category_id' => 'array',
            'tags'        => 'array',
            'created_at'  => 'date',
        ];
    }
}
