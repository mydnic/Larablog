<?php

namespace App\Http\Controllers;

use App\Page;
use App\Post;
use App\User;

class PageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        if ($users->count() == 0) {
            return view('admin.user.create');
        }

        $posts = Post::whereStatus('published')->orderBy('created_at', 'desc')->paginate(15);
        return view('post.index')
            ->with('posts', $posts);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        $page = Page::whereSlug($slug)->first();
        return view('page.show')
            ->with('page', $page);
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
