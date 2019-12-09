@extends('layouts.app')

@section('content')
    <header class="flex justify-between items-center w-full mb-3 py-4">
            <div class="flex">
                <p class="text-grey no-underline text-lg font-bold">
                    <a href="/projects">My projects</a> / {{ $project->title }}
                </p>
                <span class="mx-6 text-grey no-underline text-lg font-medium">|</span>
                <a href="#" class="button">Edit project</a>
                <a href="#" class="button">Add/remove user</a>
            </div>
            <div>
                <a href="/projects">Go back</a>
            </div>
    </header>

@include ('projects.box')

@endsection