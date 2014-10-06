<?php

class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Auth::guest() AND !Session::has('user')) {
			return View::make('sessions.create');
		}
		else{
			return Redirect::home()->withFlashMessage('Already connected :)');
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Auth::attempt(Input::only('email', 'password'))) {
			return Redirect::intended('/');
		}
		else {
			return Redirect::back()->withErrors(['Wrong Credentials.']);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id = null)
	{
		Auth::logout();
		Session::flush();

		return Redirect::to('/');
	}
}