<x-app-layout>
    <x-slot name="header">
        <h1>test</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're in example page") }}
                </div>
            </div>
            <ul>
                <li class="">
                    <a href="#">
                        Link
                    </a>
                    <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile Picture" class="mt-2 w-32 h-32 object-cover rounded-full">
                </li>
            </ul>
        </div>
    </div>
</x-app-layout>
