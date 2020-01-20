<?php

namespace App\Http\Controllers;

use App\Project;
use App\Tasklist;

use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function index(Project $project){
        $this->authorize('update', $project);

        return view('projects.tasks.index', compact('project'));
    }

    public function create(Project $project){
        return view('projects.tasks.create', compact('project'));
    }

    public function store(Project $project){
        $this->authorize('update', $project);
        
        request()->validate(['name' => 'required']);

        $project->addTasklist(request('name'));

        if (request()->wantsJson()){
            return ['message' => $project->path() . '/tasks'];
        }

        return redirect($project->path() . '/tasks');
    }

    public function update(Project $project, Tasklist $tasklist){
        $this->authorize('update', $project);
        
        $tasklist->update(request()->validate(['name' => 'required']));

        if (request()->wantsJson()){
            return ['message' => $project->path() . '/tasks'];
        }

        return redirect($project->path() . '/tasks');
    }

    public function destroy(Project $project, Tasklist $tasklist){
        $this->authorize('update', $project);
        $tasklist->delete();
        if (request()->wantsJson()){
            return ['message' => $project->path() . '/tasks'];
        }
        return redirect($project->path() . '/tasks');
    }
}
