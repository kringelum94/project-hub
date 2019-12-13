@extends('layouts.app')

@section('content')
<div class="w-1/3 mx-auto mt-16">
    <div class="box">
        <h2 class="title text-center py-4">Edit the project</h2>
    <form method="POST" action="{{$project->path()}}">
            @csrf
            @method('PATCH')
            <div>
                <div>
                    <input type="text" class="input @error('title') is-invalid @enderror" name="title" value="{{ $project->title }}" required placeholder="Project title">
                    @error('title')
                        @include ('error')
                    @enderror
                </div>
            </div>

            <div>
                <div>
                    <textarea class="textarea input @error('description') is-invalid @enderror" required placeholder="Project description" name="description">{{ $project->description }}</textarea>
                    @error('description')
                        @include ('error')
                    @enderror
                </div>
            </div>

            <div class="py-4">
                <div class="flex justify-around">
                    <button type="submit" class="button">Save project</button>
                    <a href="{{$project->path()}}" class="button danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection