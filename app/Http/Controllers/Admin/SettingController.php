<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class SettingController extends Controller {

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
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$settings = Setting::first();
		$settings->app_name = Request::get('app_name');
		$settings->app_baseline = Request::get('app_baseline');
		$settings->disqus_shortname = Request::get('disqus_shortname');

		// IMAGE BANNER
		if (Request::hasFile('banner')) {
			$file            = Request::file('banner');
			$destinationPath = public_path().'/uploads/';
			$banner_filename        = str_random(6) . '_banner_' . $file->getClientOriginalName();
			$uploadSuccess   = $file->move($destinationPath, $banner_filename);
		}
		else {
			$banner_filename = $settings->banner;
		}
		// IMAGE LOGO
		if (Request::hasFile('logo')) {
			$file            = Request::file('logo');
			$destinationPath = public_path().'/uploads/';
			$logo_filename        = str_random(6) . '_logo_' . $file->getClientOriginalName();
			$uploadSuccess   = $file->move($destinationPath, $logo_filename);
		}
		else {
			$logo_filename = $settings->logo;
		}
		// IMAGE LOGO
		if (Request::hasFile('favicon')) {
			$file            = Request::file('favicon');
			$destinationPath = public_path().'/uploads/';
			$favicon_filename        = str_random(6) . '_favicon_' . $file->getClientOriginalName();
			$uploadSuccess   = $file->move($destinationPath, $favicon_filename);
		}
		else {
			$favicon_filename = $settings->favicon;
		}



		$settings->banner = $banner_filename;
		$settings->logo = $logo_filename;
		$settings->favicon = $favicon_filename;
		$settings->save();

		return Redirect::back();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
