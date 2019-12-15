<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProjectInvitationRequest;
use App\Project;
use App\User;

class ProjectInvitationsController extends Controller
{
    public function create(Project $project){
        return view('projects.invite', compact('project'));
    }

    public function store(Project $project, ProjectInvitationRequest $request){

        $user = User::whereEmail(request('email'))->first();
        
        $project->invite($user);

        return redirect($project->path());
    }
}
