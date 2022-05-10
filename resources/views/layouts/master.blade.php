<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>@yield('title', 'Caas Project')</title>
    <script defer src="{{ asset('assets/js/alpine.min.js') }}"></script>
    @yield('head')
    @livewireStyles
</head>
<body class="d-flex flex-column">
    <header>
        @yield('header')
    </header>
    <main class="d-grid">
        @yield('content')
    </main>
    <footer>
        @yield('footer')
    </footer>
    @yield('scripts')
    @livewireScripts
</body>
</html>
