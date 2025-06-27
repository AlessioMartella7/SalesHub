<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo-bisuite.svg') }}" type="image/svg+xml">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'BISuite Centralizzato')</title>
    <meta name="description" content="@yield('meta_description', 'Gestione centralizzata vendite telefonia')">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Fonts -->
    @yield('links')

</head>
@include('partials.header')

<body>
    <div id="app">
        @yield('content')
    </div>
    @yield('additional scripts')
</body>

</html>
