<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET /admintasks.
     *
     * @return Response
     */
    public function index()
    {
        $tasks = Task::orderBy('completed')->orderBy('priority', 'desc')->get();

        return view('admin.task.index')
            ->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     * GET /admintasks/create.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.task.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /admintasks.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->input('title');
        $task->save();

        Flash::success('The task has been created.');

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     * PUT /admintasks/{id}.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->priority = $request->input('priority');
        $task->completion = $request->input('completion');
        $task->save();

        Flash::success('The task has been updated.');

        return redirect()->back();
    }

    public function toggleComplete($id)
    {
        $task = Task::findOrFail($id);
        $task->completed = !$task->completed;
        $task->save();

        Flash::success('The task has been updated.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /admintasks/{id}.
     *
     * @param int $id
     *
     * @return Response
     */
    public function delete($id)
    {
        $todo = Task::findOrFail($id);
        $todo->delete();

        Flash::success('The task has been deleted.');

        return redirect()->back();
    }
}
