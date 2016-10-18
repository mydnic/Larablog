<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreCategoryRequest;
use App\Http\Requests\AdminUpdateCategoryRequest;
use Laracasts\Flash\Flash;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::with('posts')->get();

        return view('admin.category.index')
            ->with('categories', $categories);
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
    public function store(AdminStoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        Flash::success('The category has been added.');

        return redirect()->back();
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
        $category = Category::find($id);

        return view('admin.category.edit')
            ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(AdminUpdateCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();

        Flash::success('The category has been updated.');

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
        $category = Category::find($id);
        $category->posts()->detach();
        $category->delete();

        return redirect()->back();
    }
}
