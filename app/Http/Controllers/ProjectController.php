<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $projects = Project::wherePublished(true)->orderBy('date', 'DESC')->get();

        return view('project.index')
            ->with('projects', $projects);
    }
}
