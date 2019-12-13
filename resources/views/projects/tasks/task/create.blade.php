@extends('layouts.app')

@section('content')
    <header class="flex justify-between items-center w-full mb-3 py-4">
            <div class="flex items-center">
                <p class="text-grey no-underline text-lg font-bold">
                <a href="/projects">My projects</a> / <a href="{{ $project->path() }}">{{ $project->title }}</a> / <a href="{{ $project->path() }}/tasks">Tasks</a> / Create
                </p>
            </div>
            <div>
                <a href="{{ $project->path() }}/tasks" class="back-link flex items-center">Go back</a>
            </div>
    </header>

    <div class="w-1/3 mx-auto mt-16">
    <div class="box">
        <h2 class="title text-center py-4"> Create a task </h2>
    <form method="POST" action="{{ $project->path() }}/tasks/{{ $tasklist->id }}">
            @csrf
            <div>
                <div>
                    <input type="text" class="input @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required placeholder="Task description">
                    @error('description')
                        @include ('error')
                    @enderror
                </div>
            </div>

            <div class="py-4">
                <div class="flex justify-around">
                    <button type="submit" class="button">Create task</button>
                    <a href="{{ $project->path() }}/tasks" class="button danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection