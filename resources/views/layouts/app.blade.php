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
                    <div class="ml-auto flex items-center">
                        <dropdown>
                            <template v-slot:trigger>
                                <button class="flex items-center text-green font-bold focus:outline-none">
                                    <img class="rounded-full mr-3 w-8" src="{{ gravatar_url(auth()->user()->email) }}">
                                    {{ Auth::user()->username }}
                                </button>
                            </template>
                            <theme-switcher></theme-switcher>
                            <a href="/logout" @click.prevent="$modal.show('logout-modal')" class="text-red font-medium pt-1 pb-2 px-4 block w-full text-left hover:text-green focus:outline-none">Logout</a>
                        </dropdown>
                    </div>
                </div>
            </div>
        </nav>

        <main class="container mx-auto py-4">
            @yield('content')
            <logout-modal></logout-modal>
        </main>
    </div>
</body>
</html>
