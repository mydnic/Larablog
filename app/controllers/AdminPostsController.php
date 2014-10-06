<?php

class AdminPostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /adminposts
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::all();
		return View::make('admin.post.index')
			->with('posts', $posts);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /adminposts/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.post.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /adminposts
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'title'   => 'required',
			'content' => 'required',
			'status'  => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back()
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			$post = new Post;
			$post->user_id = Auth::id();
			$post->title = Input::get('title');
			$post->content = Input::get('content');
			$post->status = Input::get('status');
			$post->allow_comments = Input::get('allow_comments');
			$post->save();
			return Redirect::to('admin/post');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /adminposts/{id}
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
	 * GET /adminposts/{id}/edit
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
	 * PUT /adminposts/{id}
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
	 * DELETE /adminposts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}