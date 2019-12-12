@extends('layouts.app')

@section('content')
    <header class="flex justify-between items-center w-full mb-3 py-4">
            <div class="flex items-center">
                <p class="text-grey no-underline text-lg font-bold">
                    <a href="/projects">My projects</a> / {{ $project->title }}
                </p>
                <span class="mx-6 text-grey no-underline text-lg font-medium">|</span>
                <a href="#" class="button">Edit project</a>
                <a href="#" class="button">Add/remove user</a>
            </div>
            <div>
                <a href="/projects" class="back-link flex items-center">Go back</a>
            </div>
    </header>

<div class="flex -ml-6 -mr-2 mt-6">
    <div class="w-7/12 mx-2">
        <div class="flex mb-8">
            <div class="box w-1/2 mx-4 h-64 relative">
            <h2 class="title"><a href="{{$project->path()}}/tasks">Tasks<span class="box-link"></span></a></h2>
                <div class="text-grey text-lg font-medium w-9/12">Create task lists and get an overview of what needs to be done.</div>
                <i class="fas fa-tasks project-icon-big"></i>
            </div>
            <div class="box w-1/2 mx-4 h-64 relative">
                <h2 class="title"><a href="#">Threads<span class="box-link"></span></a></h2>
                <div class="text-grey text-lg font-medium w-10/12">Create posts about anything, comment on them or get feedback from <br> a teacher.</div>
                <i class="fas fa-edit project-icon-big"></i>
            </div>
        </div>
        <div class="flex mb-8">
            <div class="box w-1/2 mx-4 h-64 relative">
                <h2 class="title"><a href="#">Calendar<span class="box-link"></span></a></h2>
                <div class="text-grey text-lg font-medium w-8/12">Create events, or get an overview of what is coming up.</div>
                <i class="far fa-calendar project-icon-big"></i>
            </div>
            <div class="box w-1/2 mx-4 h-64 relative">
                <h2 class="title"><a href="#">Chat<span class="box-link"></span></a></h2>
                <div class="text-grey text-lg font-medium w-4/5">Chat with the group members about everything or nothing. <br> You decide!</div>
                <i class="fas fa-comments project-icon-big"></i>
            </div>
        </div>
    </div>
    <div class="w-5/12 mx-2">
        <div class="box relative">
            <h2 class="title">{{ $project->title }}</h2>
            <div class="text-grey text-lg font-medium">{{ wordwrap($project->description, 48, "\n", true) }}</div>
        </div>
        <div class="box mt-8">
            <div class="mb-4">
                <p class="text-green font-medium">Latest activity</p>
                <p class="text-grey font-medium">Fake activity</p>
                <p class="text-grey font-medium">Fake activity</p>
                <p class="text-grey font-medium">Fake activity</p>
            </div>
            <div>
                <p class="text-green font-medium">Important links</p>
                <p class="text-grey font-medium">Fake link</p>
                <p class="text-grey font-medium">Fake link</p>
                <p class="text-grey font-medium">Fake link</p>
            </div>
        </div>
    </div>

@endsection