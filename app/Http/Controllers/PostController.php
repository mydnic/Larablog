<?php namespace App\Http\Controllers;

use Request;
use App\Post;

class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::whereStatus('published')->orderBy('created_at', 'desc')->paginate(15);
		return view('post.index')
			->with('posts', $posts);
	}

	public function getPostsByCategory($category)
	{
		$posts = Post::whereStatus('published')
		->orderBy('created_at', 'desc')
		->whereHas('categories', function($q) use ($category) {
 			$q->where('slug', '=', $category);
		})->paginate(15);

		return view('post.index')
			->with('posts', $posts);
	}


	public function search()
	{
		$query = Request::get('q');
		$posts = Post::search($query)->get();
		return view('post.search')
			->with('posts', $posts);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$post = Post::whereSlug($slug)->first();
		return view('post.show')
			->with('post', $post);
	}

}
