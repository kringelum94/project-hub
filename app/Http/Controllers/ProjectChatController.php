<?php

namespace App\Http\Controllers;
use App\Conversation;
use App\Project;
use App\Events\MessageSent;
use Illuminate\Http\Request;

class ProjectChatController extends Controller
{

    public function index(Project $project){
        $this->authorize('update', $project);
        return view('projects.chat.chat', compact('project'));
    }


    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Project $project, Request $request)
    {
        $this->authorize('update', $project);   

        $conversation = Conversation::create([
            'message' => request('message'),
            'user_id' => auth()->user()->id,
            'project_id' => request('project_id')
        ]);

        broadcast(new MessageSent($conversation))->toOthers(); 

        return $conversation->load('user');   
    }
}
