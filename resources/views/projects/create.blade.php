@extends('layouts.app')

@section('content')
    <h1> Create a project </h1>
    <form method="POST" action="/projects">
        @csrf
        <div class="field">
            <label for="title" class="label">Title</label>
            <div class="control">
                <input type="text" class="input" name="title" placeholder="Title">
            </div>
        </div>

        <div class="field">
            <label for="description" class="label">Description</label>
            <div class="control">
                <textarea class="textarea" name="description"></textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create project</button>
                <a href="/projects">Cancel</a>
            </div>
        </div>
    </form>
@endsection