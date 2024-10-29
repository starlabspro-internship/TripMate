<!-- resources/views/banners/create.blade.php -->
<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Banner') }}
        </h2>
    </x-slot>

    <!-- Page Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded mb-4 text-sm sm:text-base">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @auth
                @if(auth()->user()->is_admin === 1)
                    <!-- Banner Creation Form -->
                    <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 sm:p-6 rounded shadow">
                        @csrf
                        <div class="mb-4">
                            <label class="block font-bold mb-1 text-sm sm:text-base">Title</label>
                            <input type="text" name="title" class="w-full p-2 border rounded text-sm sm:text-base" value="{{ old('title') }}">
                        </div>
                        <div class="mb-4">
                            <label class="block font-bold mb-1 text-sm sm:text-base">Description</label>
                            <textarea name="description" class="w-full p-2 border rounded text-sm sm:text-base">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block font-bold mb-1 text-sm sm:text-base">Image</label>
                            <input type="file" name="image_path" class="w-full p-2 border rounded text-sm sm:text-base">
                        </div>
                        <div class="mb-4">
                            <label class="block font-bold mb-1 text-sm sm:text-base">Button Text</label>
                            <input type="text" name="button_text" class="w-full p-2 border rounded text-sm sm:text-base" value="{{ old('button_text') }}">
                        </div>
                        <div class="mb-4">
                            <label class="block font-bold mb-1 text-sm sm:text-base">Button Link</label>
                            <input type="text" name="button_link" class="w-full p-2 border rounded text-sm sm:text-base" value="{{ old('button_link') }}">
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="w-full sm:w-auto bg-green-500 text-white px-4 py-2 rounded text-sm sm:text-base">
                                Save
                            </button>
                        </div>
                    </form>
                @else
                    <p class="text-red-500 font-semibold mt-6 text-sm sm:text-base">
                        You do not have permission to access this page.
                    </p>
                @endif
            @endauth

        </div>
    </div>
</x-layouts.app>
