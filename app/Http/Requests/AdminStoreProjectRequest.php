<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class AdminStoreProjectRequest extends Request
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
            'sub_title'   => 'min:2|max:255',
            'description' => 'required',
            'client'      => 'max:255',
            'url'         => 'url',
            'image'       => 'required|image',
            'category_id' => 'array',
            'date'        => 'date',
        ];
    }
}
