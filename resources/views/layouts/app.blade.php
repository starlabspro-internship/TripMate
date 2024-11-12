<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>TripMate</title>

        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body class="min-h-screen bg-[#f5f5f5] dark:bg-[#0F172A] font-planer antialiased w-full md:absolute md:w-navbar">

        <div class=" flex flex-col ">

            @if(Auth::check())
                @include('layouts.navigation')
            @elseif (!Auth::check() && request()->is('/') || request()->is('home'))
                @include('components.navbar')
            @endif
            @isset($header)
                <header class="bg-white shadow w-full">
                    <div class=" py-6 px-4 sm:px-6 ">
                        {{ $header }}
                    </div>
                </header>
            @endisset
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
{{--66AAC3--}}
