<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProjectCategory;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ProjectCategoryController extends Controller
{
    public function store(Request $request)
    {
        $category = new ProjectCategory();
        $category->name = $request->input('name');
        $category->save();

        Flash::success('Category was added.');

        return redirect()->back();
    }

    public function delete($id)
    {
        $category = ProjectCategory::find($id);
        $category->projects()->detach();
        $category->delete();

        return redirect()->back();
    }
}
