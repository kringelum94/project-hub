@extends('layouts.app')

@section('content')
    <header class="flex justify-between items-center w-full mb-3 py-4">
            <div class="flex items-center">
                <p class="text-grey no-underline text-lg font-bold">
                    <a href="/projects">My projects</a>
                </p>
            </div>
            <div class="flex items-center">
                <a href="/projects" class="back-link flex items-center">Go back</a>
            </div>
    </header>
    <main>
        <h1 class="title">Project does not exist.</h1>
    </main>

@endsection