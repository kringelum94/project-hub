<?php

namespace App\Http\Controllers;

use App\Project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(){
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project){
        if(auth()->user()->isNot($project->creator)){
            abort(403);
        }

        return view('projects.show', compact('project'));
    }

    public function create(){
        return view('projects.create');
    }

    public function store(){
        $attributes = request()->validate([
            'title'=> ['required', 'min:3', 'max:191'], 
            'description' => ['required', 'min:3']
            ]);

        auth()->user()->projects()->create($attributes);
        
        return redirect('/projects');
    }
}
