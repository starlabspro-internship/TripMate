<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>TripMate</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body class="font-sans antialiased min-h-screen bg-gray-100">
        <!-- Page Heading -->
        <header class="w-full md:absolute md:w-navbar md:left-[50px]">
            @include('components.navbar')
        </header>

        <!-- Page Content -->
        <main class="p-14 bg-orange-200">
            {{ $slot }}
        </main>
    </body>
</html>
