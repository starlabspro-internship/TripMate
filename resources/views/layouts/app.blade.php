<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>TripMate</title>

        <!-- Fonts 
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />  -->

         <!-- Ereblira's font -->
        @vite('resources/css/app.css')



        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body class="min-h-screen bg-slate-600 dark:bg-[#0F172A] font-planer antialiased w-full md:absolute md:w-navbar">
        
        <div class="h-screen flex flex-col ">
            
            @if(Auth::check())  
                @include('layouts.navigation') 
            @else
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

  <!-- footer perveq ne dashboard -->
 

            
        </div>
        @unless(request()->is('dashboard*')) 
        <x-footer />
      @endunless

    </body>
</html>
