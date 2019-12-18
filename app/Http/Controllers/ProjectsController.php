<?php

namespace App\Http\Controllers;

use App\Project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(){
        $projects = auth()->user()->accessibleProjects();

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project){
        $this->authorize('update', $project);

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

        $user = auth()->user();

        $project = $user->projects()->create($attributes);

        $project->invite($user);
        
        if (request()->wantsJson()){
            return ['message' => $project->path()];
        }

        return redirect($project->path());
    }

    public function edit(Project $project){
        $this->authorize('update', $project);
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project){
        $this->authorize('update', $project);

        $attributes = request()->validate([
            'title'=> ['required', 'min:3', 'max:191'], 
            'description' => ['required', 'min:3']
            ]);

        $project->update($attributes);

        if (request()->wantsJson()){
            return ['message' => $project->path()];
        }
        
        return redirect($project->path());
    }

    public function destroy(Project $project){
        $this->authorize('manage', $project);
        $project->delete();
        if (request()->wantsJson()){
            return ['message' => '/projects'];
        }
        return redirect('/projects');
    }
}
