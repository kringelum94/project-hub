<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="theme-light bg-page">
    <div id="app">
        <nav class="bg-header">
            <div class="container mx-auto">
                <div class="flex justify-between items-center pt-3 pb-2">
                    <h1>
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="/images/projecthub-logo.png" alt="Project-Hub-logo">
                        </a>
                    </h1>

                <div>
                    <!-- Right Side Of Navbar -->
                    <ul class="ml-auto flex"> 
                        <!-- Authentication Links -->
                            <li class="mr-12 font-bold text-green text-lg">
                                <a class="menu-link relative {{ set_active('/') }}" href="/">{{ __('Register') }}</a>
                            </li>
                            <li class="mr-12 font-bold text-green text-lg">
                                <a class="menu-link relative" @click.prevent="$modal.show('login-modal')" href="/login">{{ __('Login') }}</a>
                            </li>
                            <li class="mr-12 font-bold text-green text-lg">
                                <a class="menu-link relative {{ set_active('features') }}" href="/features">{{ __('Features') }}</a>
                            </li>
                            <li class="mr-12 font-bold text-green text-lg">
                                <a class="menu-link relative {{ set_active('about') }}" href="/about">{{ __('About us') }}</a>
                            </li>
                    </ul>
                </div>
                </div>
            </div>
        </nav>

        <main class="container mx-auto py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
