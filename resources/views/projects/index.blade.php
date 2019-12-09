@extends('layouts.app')

@section('content')
    <header class="flex justify-between items-center w-full mb-3 py-4">
            <div class="flex">
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
            <div>No projects yet.</div>
        @endforelse
        </main>
@endsection