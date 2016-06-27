<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreProjectRequest;
use App\Http\Requests\AdminUpdateProjectRequest;
use App\Project;
use App\ProjectCategory;
use App\ProjectImage;
use App\Services\Upload;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $projects = Project::all();
        $categories = ProjectCategory::with('projects')->get();

        return view('admin.project.index')
            ->with('projects', $projects)
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = ProjectCategory::all();

        return view('admin.project.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(AdminStoreProjectRequest $request)
    {
        $project = new Project();
        $project->title = $request->input('title');
        $project->sub_title = $request->input('sub_title');
        $project->description = $request->input('description');
        $project->client = $request->input('client');
        $project->link = $request->input('link');
        $project->date = $request->input('date');
        $project->published = $request->input('published');

        // IMAGE BANNER
        if ($request->hasFile('image')) {
            $image = new Upload($request->file('image'));
            $project->image = $image->getFullPath();
        }

        $project->save();

        if ($request->hasFile('project_images')) {
            $files = $request->file('project_images');
            foreach ($files as $file) {
                $image = new Upload($file);

                $file = new ProjectImage();
                $file->project_id = $project->id;
                $file->image = $image->getFullPath();
                $file->save();
            }
        }

        $project->categories()->sync($request->input('category_id', []));

        Flash::success('Project has been added to your portfolio');

        return redirect()->route('admin.project.index');
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
        $project = Project::find($id);
        $categories = ProjectCategory::all();

        return view('admin.project.edit')
            ->with('categories', $categories)
            ->with('project', $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(AdminUpdateProjectRequest $request, $id)
    {
        $project = Project::find($id);
        $project->title = $request->input('title');
        $project->sub_title = $request->input('sub_title');
        $project->description = $request->input('description');
        $project->client = $request->input('client');
        $project->link = $request->input('link');
        $project->date = $request->input('date');
        $project->published = $request->input('published');

        // IMAGE BANNER
        if ($request->hasFile('image')) {
            $image = new Upload($request->file('image'));
            $project->image = $image->getFullPath();
        }

        $project->save();

        if ($request->hasFile('project_images')) {
            $project->images()->delete();
            $files = $request->file('project_images');
            foreach ($files as $file) {
                $image = new Upload($file);

                $file = new ProjectImage();
                $file->project_id = $project->id;
                $file->image = $image->getFullPath();
                $file->save();
            }
        }

        $project->categories()->sync($request->input('category_id', []));

        Flash::success('Project has been edited');

        return redirect()->route('admin.project.edit', $project->id);
    }

    public function setPublished($id)
    {
        $project = Project::findOrFail($id);
        $project->published = true;
        $project->save();

        Flash::success('Project has been published');

        return redirect()->route('admin.project.index');
    }

    public function setUnpublished($id)
    {
        $project = Project::findOrFail($id);
        $project->published = false;
        $project->save();

        Flash::success('Project has been unpublished');

        return redirect()->route('admin.project.index');
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
        $project = Project::findOrFail($id);
        $project->categories()->detach();
        $project->delete();

        Flash::success('Project deleted !');

        return redirect()->route('admin.project.index');
    }
}
