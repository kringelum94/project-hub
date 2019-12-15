@extends('layouts.app')

@section('content')
<div class="w-1/3 mx-auto mt-16">
    <div class="box">
        <h2 class="title text-center py-4">Invite a user to the project</h2>
    <form method="POST" action="{{$project->path()}}/invitations">
            @csrf
            <div>
                <div>
                    <input type="text" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="User e-mail">
                    @error('email')
                        @include ('error')
                    @enderror
                </div>
            </div>

            <div class="py-4">
                <div class="flex justify-around">
                    <button type="submit" class="button">Invite user</button>
                    <a href="{{$project->path()}}" class="button danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection