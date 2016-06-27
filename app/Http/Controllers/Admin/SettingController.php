<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdateSettingsRequest;
use App\Http\Requests\UploadImageRequest;
use App\Services\Upload;
use App\Setting;
use Illuminate\Support\Facades\Redirect;
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
    public function store(AdminUpdateSettingsRequest $request)
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
            $image = new Upload($request->file('banner'));
            $settings->banner = $image->getFullPath();
        }

        // IMAGE LOGO
        if ($request->hasFile('logo')) {
            $image = new Upload($request->file('logo'));
            $settings->logo = $image->getFullPath();
        }
        // IMAGE LOGO
        if ($request->hasFile('favicon')) {
            $image = new Upload($request->file('favicon'));
            $settings->favicon = $image->getFullPath();
        }

        $settings->save();

        Flash::success('Settings updated');

        return redirect()->back();
    }

    public function upload(UploadImageRequest $request)
    {
        $file = new Upload($request->file('image'));

        return [
            'success' => true,
            'path'    => $file->getFullPath(),
        ];
    }
}
