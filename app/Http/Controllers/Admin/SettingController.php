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
    public function edit($id)
    {
        $settings = Setting::first();

        return view('admin.settings.edit')
            ->with('settings', $settings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $settings = Setting::first();
        $settings->app_name = $request->input('app_name');
        $settings->app_baseline = $request->input('app_baseline');
        $settings->disqus_shortname = $request->input('disqus_shortname');
        $settings->google_analytics_code = $request->input('google_analytics_code');
        $settings->post_bottom_scripts = $request->input('post_bottom_scripts');
        $settings->show_on_front = $request->input('show_on_front');

        // IMAGE BANNER
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $destinationPath = public_path().'/uploads/';
            $banner_filename = str_random(6).'_banner_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $banner_filename);
        } else {
            $banner_filename = $settings->banner;
        }
        // IMAGE LOGO
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = public_path().'/uploads/';
            $logo_filename = str_random(6).'_logo_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $logo_filename);
        } else {
            $logo_filename = $settings->logo;
        }
        // IMAGE LOGO
        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
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

        return redirect()->back();
    }

    public function upload(UploadImageRequest $request)
    {
        $file = new Upload($request->file('image'));

        return [
            'success' => true,
            'path' => $file->getFullPath()
        ];
    }
}
