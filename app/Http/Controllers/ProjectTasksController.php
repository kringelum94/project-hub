<?php

namespace App\Http\Controllers;

use App\Project;

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
        return redirect($project->path() . '/tasks');
    }
}
