@extends('layouts.app')

@section('content')
    <header class="flex w-full mb-3 py-4">
            <div class="flex items-center">
                <p class="text-grey no-underline text-lg font-bold">My projects</p>
                <span class="mx-6 text-grey no-underline text-lg font-medium">|</span>
                <a href="/projects/create" class="button">Create project</a>
            </div>
    </header>
    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse ($projects as $project)
        <div class="lg:w-1/3 px-3 pb-6">
            @include ('projects.box')
        </div>
        @empty
        <div class="px-3 text-green text-lg font-bold">No projects yet, click on the "Create project" button to get started.</div>
        @endforelse
    </main>
@endsection