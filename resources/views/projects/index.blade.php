@extends('layouts.app')

@section('content')
<header class="flex items-center mb-3 py-4">
    <h2 class="text-grey no-underline text-lg font-bold">My projects</h2>
    <span class="mx-6 text-grey no-underline text-lg font-medium">|</span>
    <a href="/projects/create" class="button">Create project</a>
</header>
    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse ($projects as $project)
            <div class="lg:w-1/3 px-3 pb-6">
                <div class="bg-white border-green border-2 rounded-lg shadow p-5" style="height: 200px">
                    <h3 class="font-bold text-green text-2xl mb-4"><a href=" {{$project->path()}} ">{{ $project->title }}</a></h3>
                    <div class="text-grey text-lg font-medium">{{ Str::limit($project->description, 150) }}</div>
                </div>
            </div>
        @empty
            <div>No projects yet.</div>
        @endforelse
        </main>
@endsection