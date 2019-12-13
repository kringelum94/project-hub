<?php

namespace App\Http\Controllers;

use App\Project;

use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function index(Project $project){
        if(auth()->user()->isNot($project->creator)){
            abort(403);
        }

        return view('projects.tasks.index', compact('project'));
    }

    public function create(){
    }

    public function store(Project $project){
        request()->validate(['name' => 'required']);
        $project->addTasklist(request('title'));
        return redirect($project->path());
    }
}
