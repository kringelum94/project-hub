@extends('layouts.app')
@section('content')

    <header class="flex justify-between items-center w-full mb-3 py-4">
            <div class="flex items-center">
                <p class="text-grey no-underline text-lg font-bold">
                <a href="/projects">My projects</a> / <a href="{{ $project->path() }}">{{ $project->title }}</a> / Chat
                </p>
            </div>
            <div>
                <a href="{{ $project->path() }}" class="back-link flex items-center">Go back</a>
            </div>
    </header>

<group-chat :user="{{ Auth::user() }}" :messages="{{ $project->conversations->sortByDesc('created_at')->take(10)->load('user') }}" :project="{{ $project }}" :key="{{ $project->id }}"></group-chat>

@endsection