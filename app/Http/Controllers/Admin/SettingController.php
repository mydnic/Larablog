<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadImageRequest;
use App\Services\Upload;
use App\Setting;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Laracasts\Flash\Flash;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $settings = Setting::first();

        return view('admin.settings.index')
            ->with('settings', $settings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $settings = Setting::first();
        $settings->app_name = Request::input('app_name');
        $settings->app_baseline = Request::input('app_baseline');
        $settings->disqus_shortname = Request::input('disqus_shortname');
        $settings->google_analytics_code = Request::input('google_analytics_code');
        $settings->post_bottom_scripts = Request::input('post_bottom_scripts');
        $settings->show_on_front = Request::input('show_on_front');

        // IMAGE BANNER
        if (Request::hasFile('banner')) {
            $file = Request::file('banner');
            $destinationPath = public_path().'/uploads/';
            $banner_filename = str_random(6).'_banner_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $banner_filename);
        } else {
            $banner_filename = $settings->banner;
        }
        // IMAGE LOGO
        if (Request::hasFile('logo')) {
            $file = Request::file('logo');
            $destinationPath = public_path().'/uploads/';
            $logo_filename = str_random(6).'_logo_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $logo_filename);
        } else {
            $logo_filename = $settings->logo;
        }
        // IMAGE LOGO
        if (Request::hasFile('favicon')) {
            $file = Request::file('favicon');
            $destinationPath = public_path().'/uploads/';
            $favicon_filename = str_random(6).'_favicon_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $favicon_filename);
        } else {
            $favicon_filename = $settings->favicon;
        }

        $settings->banner = $banner_filename;
        $settings->logo = $logo_filename;
        $settings->favicon = $favicon_filename;
        $settings->save();

        Flash::success('Settings updated');

        return Redirect::back();
    }

    public function upload(UploadImageRequest $request)
    {
        $file = new Upload($request->file('image'));

        return [
            'success' => true,
            'data'    => [
                'link' => $file->getFullPath(),
            ],
        ];
    }
}
