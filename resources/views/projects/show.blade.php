@extends('layouts.app')

@section('content')
    <header class="flex justify-between items-center w-full mb-3 py-4">
            <div class="flex items-center">
                <p class="text-grey no-underline text-lg font-bold">
                    <a href="/projects">My projects</a> / {{ $project->title }}
                </p>
                @can ('manage', $project)
                    <span class="mx-6 text-grey no-underline text-lg font-medium">|</span>
                    <a href="{{$project->path()}}/edit" class="button" @click.prevent="$modal.show('edit-project-modal', {title: '{{ $project->title }}', description: '{{ $project->description }}', path: '{{ $project->path() }}' })">Edit project</a>
                    <a href="{{$project->path()}}/invitations" class="button" @click.prevent="$modal.show('invite-member-modal', {path: '{{ $project->path() }}/invitations'})">Invite user</a>
                    <a href="{{$project->path()}}/delete" class="button danger" @click.prevent="$modal.show('delete-project-modal', {path: '{{ $project->path() }}'})">Delete project</a>
                @endcan
            </div>
            <div class="flex items-center">
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
                <h2 class="title"><a href="{{$project->path()}}/chat">Chat<span class="box-link"></span></a></h2>
                <div class="text-grey text-lg font-medium w-4/5">Chat with the group members about everything or nothing. <br> You decide!</div>
                <i class="fas fa-comments project-icon-big"></i>
            </div>
        </div>
    </div>
    <div class="w-5/12 mx-2">
        <div class="box relative">
            <h2 class="title">{{ $project->title }}</h2>
            <div class="text-grey text-lg font-medium mb-4">{{ wordwrap($project->description, 48, "\n", true) }}</div>
            <div class="text-green text-lg font-medium">Members</div>
            <div class="flex items-center">
                @foreach ($project->members as $member)
                <img title="{{ $member->username }} {{ $member->id == $project->creator->id ? '- ADMIN' : '' }}" src="{{ gravatar_url($member->email) }}" alt="{{ $member->username }}'s avatar" 
                class="rounded-full w-8 mr-2 {{ $member->id == $project->creator->id ? 'border-2 border-green' : '' }}">
                @endforeach
            </div>
        </div>
        <div class="box mt-8">
            @include('projects.activity.section')
            <div>
                <h5 class="text-green font-medium">Important links</h5>
                <p class="text-grey font-medium">Fake link</p>
                <p class="text-grey font-medium">Fake link</p>
                <p class="text-grey font-medium">Fake link</p>
            </div>
        </div>
    </div>

<edit-project-modal></edit-project-modal>
<invite-member-modal></invite-member-modal>
<delete-project-modal></delete-project-modal>
@endsection