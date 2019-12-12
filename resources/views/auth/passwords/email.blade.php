@extends('layouts.landing')

@section('content')
<div class="w-1/3 mx-auto mt-16">
    <div class="box">
        <h2 class="title text-center py-4">Reset password</h2>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div>
                <div>
                    <input id="email" type="email" placeholder="E-mail" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        @include ('error')
                    @enderror
                </div>
            </div>

            <div>
                <div class="flex justify-around items-center pt-2 pb-4">
                    <button type="submit" class="button">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
