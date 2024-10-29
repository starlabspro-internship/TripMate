<!-- resources/views/banners/edit.blade.php -->
<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Banner') }}
        </h2>
    </x-slot>

    <!-- Page Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Conditionally show the edit form for admin users only -->
            @auth
                @if(Auth::user()->is_admin === 1)
                    <form action="{{ route('banners.update', $banner) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 sm:p-6 rounded shadow">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-4">
                            <label class="block font-bold mb-1 text-sm sm:text-base">Title</label>
                            <input type="text" name="title" class="text-4xl font-extrabold text-gray-800 leading-tight mb-4" value="{{ $banner->title }}" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label class="block font-bold mb-1 text-sm sm:text-base">Description</label>
                            <textarea name="description" class="w-full p-2 border rounded text-sm sm:text-base" required>{{ $banner->description }}</textarea>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-4">
                            <label class="block font-bold mb-1 text-sm sm:text-base">Image</label>
                            <input type="file" name="image_path" class="w-full p-2 border rounded text-sm sm:text-base" accept="image/*">
                            <img src="{{ asset('storage/'.$banner->image_path) }}" alt="Current Banner Image" class="w-24 h-24 mt-2 sm:w-32 sm:h-32 object-cover">
                        </div>

                        <!-- Button Text -->
                        <div class="mb-4">
                            <label class="block font-bold mb-1 text-sm sm:text-base">Button Text</label>
                            <input type="text" name="button_text" class="w-full p-2 border rounded text-sm sm:text-base" value="{{ $banner->button_text }}" required>
                        </div>

                        <!-- Button Link -->
                        <div class="mb-4">
                            <label class="block font-bold mb-1 text-sm sm:text-base">Button Link</label>
                            <input type="text" name="button_link" class="w-full p-2 border rounded text-sm sm:text-base" value="{{ $banner->button_link }}" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button type="submit" class="w-full sm:w-auto bg-green-500 text-white px-4 py-2 rounded text-sm sm:text-base hover:bg-green-600 transition duration-200">Update</button>
                        </div>
                    </form>
                @else
                    <p class="text-red-500 font-semibold mt-6 text-sm sm:text-base">You do not have permission to edit banners.</p>
                @endif
            @endauth

        </div>
    </div>
</x-layouts.app>
