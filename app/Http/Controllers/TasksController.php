<?php

namespace App\Http\Controllers;

use App\Project;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(Project $project){
        if(auth()->user()->isNot($project->creator)){
            abort(403);
        }

        return view('projects.tasks.index', compact('project'));
    }

    public function create(){
    }

    public function store(){
    }
}
