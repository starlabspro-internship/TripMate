<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl w-full">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <div class="ml-auto flex-col items-center mr-20 text-center" >
                    <img id="profileImage" class=" border-2 border-[#76A8B2] -bottom-10 left-8 w-40 h-40 rounded-full "
                    @if(auth()->user()->image)
                        <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="User Image">
                    @else
                        <img src="{{ asset('https://eu.ui-avatars.com/api/' . auth()->user()->name  . '+' . auth()->user()->lastname . 'size=250') }}" alt="Default Image">
                    @endif
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.contact')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event) {
            const image = document.getElementById('profileImage');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    image.src = e.target.result; // Update the image preview
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>
