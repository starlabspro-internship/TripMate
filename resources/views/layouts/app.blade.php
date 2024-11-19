<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

        <title>TripMate</title>

        <!-- Scripts -->
        <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
        @vite('resources/js/app.js')
    </head>
    <body class="min-h-screen bg-[#f5f5f5] dark:bg-[#0F172A] font-planer antialiased w-full md:absolute md:w-navbar">

        <div class="flex flex-col">
            <!-- Display navigation only if user is authenticated and not on `enter.code` page -->
            @if(Auth::check() && !request()->routeIs('enter.code'))
                @include('layouts.navigation')

            @elseif (!Auth::check() && request()->is('/') || request()->is('home'))

                @include('components.navbar')
            @endif
            
            <!-- Display the header only if it's set and not on `enter.code` page -->
            @isset($header)
                @if (!request()->routeIs('enter.code'))
                    <header class="bg-white shadow w-full">
                        <div class="py-6 px-4 sm:px-6">
                            {{ $header }}
                        </div>
                    </header>
                @endif
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
<!-- Color Code: #66AAC3 -->
