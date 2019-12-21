@extends('layouts.landing')

@section('content')
<div class="flex items-center mt-16">
    <div class="w-3/5 pr-16">
        <h1 class="font-bold text-green text-5xl mb-12 leading-tight">Managing your school projects is easier than ever before.</h1>

        <h3 class="text-xl text-grey mb-4">Project Hub is a project management tool built with students in mind. 
        It takes the tools students use the most, and combine them 
        into one easy-to-use, convenient package.<h3>

        <h3 class="text-xl text-grey mb-4">Try it now, completely free.<h3>

        <div class="flex justify-center mt-12">
            <a href="/login" @click.prevent="$modal.show('login-modal')" class="button hover:text-white mx-6">{{ __('Login') }}</a>
            <span class="mx-6 text-xl text-grey font-medium">or</span>
            <a href="/features" class="arrow-link mx-6">Look at the features</a>
        </div>
    </div>

    <div class="box w-2/5">
        <h2 class="title text-center py-4">Register for free</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <div class="mb-4">
                    <input id="username" type="text" class="input @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username">
                    @error('username')
                        @include ('error')
                    @enderror
                </div>
            </div>

            <div>

                <div class="mb-4">
                    <input id="email" type="email" class="input @error('email') is-invalid @enderror" placeholder="E-mail" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        @include ('error')
                    @enderror
                </div>
            </div>

            <div>

                <div class="mb-4">
                    <input id="password" type="password" class="input @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">

                    @error('password')
                        @include ('error')
                    @enderror
                </div>
            </div>

            <div>

                <div class="mb-4">
                    <input id="password-confirm" type="password" class="input" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                </div>
            </div>

            <div>
                <div class="flex justify-center pt-2 pb-4">
                    <button type="submit" class="button hover:text-white">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<login-modal></login-modal>

@endsection
