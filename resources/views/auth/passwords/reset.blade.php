@extends('layouts.landing')

@section('content')
<div class="w-1/3 mx-auto mt-16">
    <div class="box">
        <h2 class="title text-center py-4">Reset password</h2>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <div class="mb-4">
                    <input id="email" type="email" placeholder="E-mail" class="input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        @include ('error')
                    @enderror
                </div>
            </div>

            <div>
                <div class="mb-4">
                    <input id="password" placeholder="New password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        @include ('error')
                    @enderror
                </div>
            </div>

            <div>
                <div class="mb-4">
                    <input id="password-confirm" placeholder="Confirm new password" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div>
                <div class="flex justify-around items-center pt-2 pb-4">
                    <button type="submit" class="button hover:text-white">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
