@extends('layouts.landing')

@section('content')
<div class="w-1/3 mx-auto mt-16">
    <div class="box">
        <h2 class="title text-center py-4">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <div>
                    <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        @include ('error')
                    @enderror
                </div>
            </div>

            <div>
                <div>
                    <input id="password" type="password" class="input @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                    @error('password')
                        @include ('error')
                    @enderror
                </div>
            </div>

            <div>
                <div class="flex justify-around items-center pt-2 pb-4">
                    <button type="submit" class="button hover:text-white">
                        {{ __('Login') }}
                    </button>

                        <a class="text-green font-medium" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
