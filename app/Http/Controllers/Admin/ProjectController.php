<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\AdminStoreProjectRequest;
use App\Project;
use App\ProjectCategory;
use App\ProjectImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use Request;

class ProjectController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = Project::all();
		return view('admin.project.index')
			->with('projects', $projects);
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
		$project = new Project;
		$project->title = Request::get('title');
		$project->sub_title = Request::get('sub_title');
		$project->description = Request::get('description');
		$project->client = Request::get('client');
		$project->link = Request::get('link');
		$project->date = Request::get('date');

		// IMAGE BANNER
		if (Request::hasFile('image')) {
			$file            = Request::file('image');
			$destinationPath = public_path().'/uploads/';
			$filename 		 = urlencode(str_random(8) . '_project_image_' . $file->getClientOriginalName());
			$uploadSuccess   = $file->move($destinationPath, $filename);
			$project->image = $filename;
		}
		$project->save();

		if (Request::hasFile('project_images')) {
			$files = Request::file('project_images');
			foreach ($files as $file) {
				$destinationPath = public_path().'/uploads/';
				$filename        = urlencode(str_random(6) . '_project_images_' . Auth::id() . $file->getClientOriginalName());
				$extension       = $file->getClientOriginalExtension();
				$uploadSuccess   = $file->move($destinationPath, $filename);

				$file = new ProjectImage;
				$file->project_id = $project->id;
				$file->image = $filename;
				$file->save();
			}
		}

		$project->categories()->sync(Request::get('category_id'));
		
		Flash::success('Project has been added to your portfolio');
		return Redirect::route('admin.project.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
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
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$project = Project::find($id);
		$project->title = Request::get('title');
		$project->sub_title = Request::get('sub_title');
		$project->description = Request::get('description');
		$project->client = Request::get('client');
		$project->link = Request::get('link');
		$project->date = Request::get('date');

		// IMAGE BANNER
		if (Request::hasFile('image')) {
			$file            = Request::file('image');
			$destinationPath = public_path().'/uploads/';
			$filename 		 = urlencode(str_random(8) . '_project_image_' . $file->getClientOriginalName());
			$uploadSuccess   = $file->move($destinationPath, $filename);
			$project->image = $filename;
		}
		$project->save();


		if (Request::hasFile('project_images')) {
			$project->images()->delete();
			$files = Request::file('project_images');
			foreach ($files as $file) {
				$destinationPath = public_path().'/uploads/';
				$filename        = str_random(6) . '_project_images_' . Auth::id() . $file->getClientOriginalName();
				$extension       = $file->getClientOriginalExtension();
				$uploadSuccess   = $file->move($destinationPath, $filename);

				$file = new ProjectImage;
				$file->project_id = $project->id;
				$file->image = $filename;
				$file->save();
			}
		}

		$project->categories()->sync(Request::get('category_id'));
		
		Flash::success('Project has been edited');
		return Redirect::route('admin.project.edit', $project->id);
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
