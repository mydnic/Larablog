<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFirstAdminRequest;
use App\Page;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class DashboardController extends Controller
{
    /**
     * Display the main dashboard page
     *
     * @return Response
     */
    public function index()
    {
        $posts_without_image = Post::whereNull('image')->count();
        $pages_without_image = Page::whereNull('image')->count();
        return view('admin.index')
            ->with('posts_without_image', $posts_without_image)
            ->with('pages_without_image', $pages_without_image);
    }

    public function storeAdminUser(CreateFirstAdminRequest $request)
    {
        $user = new User();
        $user->email = Request::get('email');
        $user->password = Hash::make(Request::get('password'));
        $user->superuser = true;
        $user->username = 'Admin';
        $user->save();

        Auth::login($user);

        return Redirect::to('admin/index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
