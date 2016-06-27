<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
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
        ->whereHas('categories', function ($q) use ($category) {
            $q->where('slug', '=', $category);
        })->paginate(15);

        return view('post.index')
            ->with('posts', $posts);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($slug)
    {
        $post = Post::whereSlug($slug)->first();

        $keywords = '';
        foreach ($post->tags as $tag) {
            $keywords .= $tag->name.',';
        }

        return view('post.show')
            ->with('keywords', $keywords)
            ->with('post', $post);
    }
}
