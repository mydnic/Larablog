<?php namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPostNewPostRequest;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Laracasts\Flash\Flash;

class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /adminposts
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::all();
		return view('admin.post.index')
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
		$categories = Category::all();
		return view('admin.post.create')
			->with('categories', $categories);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /adminposts
	 *
	 * @return Response
	 */
	public function store(AdminPostNewPostRequest $request)
	{

		$post = new Post;
		$post->user_id = Auth::id();
		$post->title = Request::get('title');
		$post->content = Request::get('content');
		$post->status = Request::get('status');
		$post->allow_comments = Request::get('allow_comments');
		$post->save();
		
		$post->categories()->sync(Request::get('category_id'));

		return Redirect::route('admin.post.index');
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
		$post = Post::find($id);
		$categories = Category::all();
		$tags = Tag::groupBy('name')->lists('name');
		return view('admin.post.edit')
			->with('post', $post)
			->with('tags', json_encode($tags))
			->with('categories', $categories);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /adminposts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(AdminPostNewPostRequest $request, $id)
	{

		$post = Post::find($id);
		$post->title = Request::get('title');
		$post->content = Request::get('content');
		$post->status = Request::get('status');
		$post->allow_comments = Request::get('allow_comments');

		// IMAGE BANNER
		if (Request::hasFile('image')) {
			$file            = Request::file('image');
			$destinationPath = public_path().'/uploads/';
			$filename 		 = str_random(6) . '_image_' . $file->getClientOriginalName();
			$uploadSuccess   = $file->move($destinationPath, $filename);
		}
		else {
			$filename = $post->image;
		}

		$post->image = $filename;
		$post->save();

		// Clear previous tags
		$current_tags = $post->tags()->delete();
		$tags = Request::get('tags');
		foreach ($tags as $tag) {
			$new_tag = new Tag;
			$new_tag->name = $tag;
			$post->tags()->save($new_tag);
		}

		$post->categories()->sync(Request::get('category_id'));

		Flash::success('Post edited !');

		return Redirect::back();
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