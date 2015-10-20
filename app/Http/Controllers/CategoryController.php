<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET /categories.
     *
     * @return Response
     */
    public function index()
    {
        return Category::with('posts')->get();
    }

    /**
     * Show the form for creating a new resource.
     * GET /categories/create.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /categories.
     *
     * @return Response
     */
    public function store()
    {
        $category = new Category();
        $category->name = Request::get('name');
        $category->save();

        return $category;
    }

    /**
     * Display the specified resource.
     * GET /categories/{id}.
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
     * GET /categories/{id}/edit.
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
     * PUT /categories/{id}.
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
     * DELETE /categories/{id}.
     *
     * @param int $id
     *
     * @return Response
     */
    public function delete()
    {
        $category = Category::find(Input::get('id'));
        $category->delete();
    }
}
