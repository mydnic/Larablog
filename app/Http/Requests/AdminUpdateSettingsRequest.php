<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class AdminUpdateSettingsRequest extends Request
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
            'app_name'              => 'required|max:255',
            'app_baseline'          => 'max:255',
            'disqus_shortname'      => 'max:255',
            'google_analytics_code' => 'max:255',
            'post_bottom_scripts'   => 'max:255',
            'show_on_front'         => 'required|max:255',
            'banner'                => 'image',
            'logo'                  => 'image',
            'favicon'               => 'image',
        ];
    }
}
