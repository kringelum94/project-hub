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

        if (request()->wantsJson()){
            return ['message' => $project->path() . '/tasks'];
        }

        return redirect($project->path() . '/tasks');
    }

    public function update(Project $project, Task $task){
        $this->authorize('update', $project);
        
        if(request('description')){
            $task->update(request()->validate(['description' => 'required']));
        }

        request('completed') ? $task->complete() : $task->incomplete();

        if (request()->wantsJson()){
            return ['message' => $project->path() . '/tasks'];
        }

        return redirect($project->path() . '/tasks');
    }

    public function destroy(Project $project, Task $task){
        $this->authorize('update', $project);
        $task->delete();
        if (request()->wantsJson()){
            return ['message' => $project->path() . '/tasks'];
        }
        return redirect($project->path() . '/tasks');
    }
}
