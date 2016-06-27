<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchPosts(Request $request)
    {
        $query = $request->input('q');
        $posts = Post::search($query)->whereStatus('published')->paginate(15);

        return view('post.index')
            ->with('posts', $posts);
    }
}
