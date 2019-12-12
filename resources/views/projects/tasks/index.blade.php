@extends('layouts.app')

@section('content')
    <header class="flex justify-between items-center w-full mb-3 py-4">
            <div class="flex items-center">
                <p class="text-grey no-underline text-lg font-bold">
                <a href="/projects">My projects</a> / <a href="{{ $project->path() }}">{{ $project->title }}</a> / Tasks
                </p>
                <span class="mx-6 text-grey no-underline text-lg font-medium">|</span>
                <a href="#" class="button">Add list</a>
            </div>
            <div>
                <a href="{{ $project->path() }}" class="back-link flex items-center">Go back</a>
            </div>
    </header>

    <h2 class="title-big">Tasks</h2>
    <p class="grey-text">No tasks yet. Click the "Add list" button to get started.</p>

@endsection