<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>TripMate</title>

        <!-- Scripts -->
        <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
        <!-- jQuery UI and jQuery Libraries (CDN) -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">

        
        @vite('resources/js/app.js')
    </head>
    <body class="min-h-screen bg-[#f5f5f5] dark:bg-[#0F172A] font-planer antialiased w-full md:absolute md:w-navbar">

        <div class="flex flex-col">
            @if(Auth::check())
                @include('components.success')
            @endif
            @if(Auth::check())
                    @if (session('error'))
                    @endif
                    @if(session('success'))
                    @endif
                        @if($errors->any())

                        @endif
            @endif
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
                @if (!Auth::check())
                {{ $slot }}
                @endif
            </main>
        </div>
    </body>
</html>
<!-- Color Code: #66AAC3 -->
