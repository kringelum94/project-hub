<?php

namespace App\Http\Controllers;

use App\Project;
use App\Tasklist;
use App\Task;

use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{
    public function index(){
    }

    public function create(Project $project, Tasklist $tasklist){
        return view('projects.tasks.task.create', compact('project', 'tasklist'));
    }

    public function store(Project $project, Tasklist $tasklist){
        $this->authorize('update', $project);

        $attributes = request()->validate([
            'description' => ['required', 'min:3']
            ]);

        $tasklist->addTask($attributes);

        return redirect($project->path() . '/tasks');
    }

    public function update(Project $project, Task $task){
        $this->authorize('update', $task->tasklist->project);

/*      $attributes = request()->validate([
            'description' => 'required'
        ]);

        $task->update($attributes); */

        request('completed') ? $task->complete() : $task->incomplete();

        return redirect($project->path() . '/tasks');
    }
}
