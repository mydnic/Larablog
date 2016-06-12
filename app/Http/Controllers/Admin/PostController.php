<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStorePostRequest;
use App\Http\Requests\AdminUpdatePostRequest;
use App\Post;
use App\Services\Upload;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET /admin/post.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::all();
        $categories = Category::with('posts')->get();

        return view('admin.post.index')
            ->with('posts', $posts)
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     * GET /admin/post/create.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::groupBy('name')->pluck('name');

        return view('admin.post.create')
            ->with('tags', json_encode($tags))
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     * POST /admin/post.
     *
     * @return Response
     */
    public function store(AdminStorePostRequest $request)
    {
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->status = $request->input('status');
        $post->lang = $request->input('lang');
        $post->allow_comments = $request->input('allow_comments');

        // IMAGE BANNER
        if ($request->hasFile('image')) {
            $image = new Upload($request->file('image'));
            $post->image = $image->getFullPath();
        }

        $post->save();

        // Clear previous tags
        $current_tags = $post->tags()->delete();
        $tags = $request->input('tags');
        if (count($tags)) {
            foreach ($tags as $tag) {
                $new_tag = new Tag();
                $new_tag->name = $tag;
                $post->tags()->save($new_tag);
            }
        }

        $post->categories()->sync($request->input('category_id', []));

        return redirect()->route('admin.post.index');
    }

    /**
     * Show the form for editing the specified resource.
     * GET /admin/post/{id}/edit.
     *
     * @param int $id
     *
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
     * PUT /admin/post/{id}.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(AdminUpdatePostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->status = $request->input('status');
        $post->lang = $request->input('lang');
        $post->allow_comments = $request->input('allow_comments');
        $post->created_at = $request->input('created_at');
        $post->is_updated = $request->input('is_updated');

        // IMAGE BANNER
        if ($request->hasFile('image')) {
            $image = new Upload($request->file('image'));
            $post->image = $image->getFullPath();
        }

        $post->save();

        // Clear previous tags
        $current_tags = $post->tags()->delete();
        $tags = $request->input('tags');
        if (count($tags)) {
            foreach ($tags as $tag) {
                $new_tag = new Tag();
                $new_tag->name = $tag;
                $post->tags()->save($new_tag);
            }
        }

        $post->categories()->sync($request->input('category_id', []));

        Flash::success('Post edited !');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /admin/post/{id}.
     *
     * @param int $id
     *
     * @return Response
     */
    public function delete($id)
    {
        $post = Post::find($id);
        $post->categories()->detach();
        $post->delete();

        Flash::success('Post deleted !');

        return redirect()->route('admin.post.index');
    }
}
