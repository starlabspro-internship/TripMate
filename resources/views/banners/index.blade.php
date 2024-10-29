<!-- resources/views/banners/index.blade.php -->
<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Banners') }}
        </h2>
    </x-slot>

    <!-- Page Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Conditionally show 'Add New Banner' button for admin users -->
            @auth
                @if(Auth::user()->is_admin === 1)
                    <a href="{{ route('banners.create') }}" class="text-4xl font-extrabold text-gray-800 leading-tight mb-4">Add New Banner</a>
                @endif
            @endauth

            <!-- Responsive Grid Layout -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                @foreach($banners as $banner)
                    <div class="bg-white p-4 rounded shadow hover:shadow-lg transition-shadow duration-200">
                        <img src="{{ asset('storage/'.$banner->image_path) }}" alt="Banner Image" class="w-full h-40 object-cover rounded">
                        <h2 class="text-lg sm:text-xl font-bold mt-2">{{ $banner->title }}</h2>
                        <p class="text-sm sm:text-base mt-1">{{ $banner->description }}</p>
                        <a href="{{ $banner->button_link }}" class="text-4xl font-extrabold text-gray-800 leading-tight mb-4">{{ $banner->button_text }}</a>

                        <!-- Conditionally show 'Edit' and 'Delete' buttons for admin users -->
                        @auth
                            @if(Auth::user()->is_admin === 1)
                                <div class="flex mt-2 space-x-2">
                                    <a href="{{ route('banners.edit', $banner) }}" class="bg-yellow-500 w-full text-white px-4 py-2 rounded hover:bg-yellow-600 transition-colors duration-200">
                                            <?xml version="1.0" ?><svg class="feather feather-edit" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                    </a>
                                    <form action="{{ route('banners.destroy', $banner) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 w-full text-white px-4 py-2 rounded hover:bg-red-600 transition-colors duration-200">Delete</button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>
