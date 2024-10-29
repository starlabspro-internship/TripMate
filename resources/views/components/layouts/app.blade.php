<!-- resources/views/components/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite('resources/js/app.js')
</head>

<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Banner Component -->
    @if ($banner = \App\Models\Banner::latest()->first())
        <div class="relative max-w-full bg-cover bg-center h-64 sm:h-80 md:h-96 lg:h-[50vh]" style="background-image: url('{{ asset('storage/'.$banner->image_path) }}');">
            <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
                <div class="text-white text-center p-4">
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold">{{ $banner->title }}</h1>
                    <p class="mt-2 text-sm sm:text-base">{{ $banner->description }}</p>
                    <a href="{{ $banner->button_link }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 max-w-full rounded transition duration-200">
                        {{ $banner->button_text }}
                    </a>
                </div>
            </div>
        </div>
    @endif

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main class="px-4 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>
</div>
</body>

</html>
