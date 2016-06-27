<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreSocialLinkRequest;
use App\Http\Requests\AdminUpdateSocialLinkRequest;
use App\SocialLink;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $links = SocialLink::all();

        return view('admin.social.index')
            ->with('links', $links);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.social.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(AdminStoreSocialLinkRequest $request)
    {
        $link = new SocialLink();
        $link->title = $request->input('title');
        $link->url = $request->input('url');
        $link->icon = $request->input('icon');
        $link->save();

        Flash::success('Link successfully added');

        return redirect()->route('admin.social.index');
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
        $link = SocialLink::find($id);

        return view('admin.social.edit')
            ->with('link', $link);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(AdminUpdateSocialLinkRequest $request, $id)
    {
        $link = SocialLink::find($id);
        $link->title = $request->input('title');
        $link->url = $request->input('url');
        $link->icon = $request->input('icon');
        $link->save();

        Flash::success('Link successfully updated');

        return redirect()->back();
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
        SocialLink::find($id)->delete();

        Flash::success('Link deleted.');

        return redirect()->route('admin.social.index');
    }
}
