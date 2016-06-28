<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStorePageRequest;
use App\Http\Requests\AdminUpdatePageRequest;
use App\Page;
use App\Services\Upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('admin.page.index')
            ->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(AdminStorePageRequest $request)
    {
        $page = new Page();
        $page->user_id = Auth::id();
        $page->title = $request->input('title');
        $page->content = $request->input('content');
        $page->status = $request->input('status');
        $page->lang = $request->input('lang');
        $page->allow_comments = $request->input('allow_comments', false);

        if ($request->hasFile('image')) {
            $image = new Upload($request->file('image'));
            $page->image = $image->getFullPath();
        }

        $page->save();

        Flash::success('The page has been added');

        return redirect()->route('admin.page.index');
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
        $page = Page::find($id);

        return view('admin.page.edit')
            ->with('page', $page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(AdminUpdatePageRequest $request, $id)
    {
        $page = Page::find($id);
        $page->title = $request->input('title');
        $page->content = $request->input('content');
        $page->status = $request->input('status');
        $page->lang = $request->input('lang');
        $page->allow_comments = $request->input('allow_comments', false);

        if ($request->hasFile('image')) {
            $image = new Upload($request->file('image'));
            $page->image = $image->getFullPath();
        }

        $page->save();

        Flash::success('The page has been updated');

        return redirect()->route('admin.page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function delete($id)
    {
        Page::find($id)->delete();

        Flash::success('Page deleted.');

        return redirect()->route('admin.page.index');
    }
}
