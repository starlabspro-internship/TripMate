<x-guest-layout>
    <div class="absolute inset-0 bg-gradient-to-b from-blue-800 via-green-900 to-blue-900 flex items-center justify-center px-4 overflow-hidden">
        <!-- Background Waves -->
        <svg class="absolute top-0 left-0 right-0 w-full h-full opacity-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#3b82f6" fill-opacity="0.3" d="M0,320L60,266.7C120,213,240,107,360,80C480,53,600,107,720,149.3C840,192,960,224,1080,224C1200,224,1320,192,1380,170.7L1440,149.3V320H1380C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320H0Z"></path>
            <path fill="#6366f1" fill-opacity="0.2" d="M0,224L60,213.3C120,203,240,181,360,192C480,203,600,245,720,229.3C840,213,960,139,1080,122.7C1200,107,1320,149,1380,170.7L1440,192V320H1380C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320H0Z"></path>
        </svg>

        <!-- Form Container -->
        <div class="relative z-10 p-8 rounded-lg shadow-lg bg-white bg-opacity-95 w-full max-w-lg md:max-w-md">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" 
                        class="block mt-1 w-full px-4 py-2 rounded-md shadow-xl bg-white border-0 focus:ring-0 hover:shadow-xl focus:shadow-xl transition-shadow duration-300 ease-in-out" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex justify-end mt-4">
                    <x-primary-button class="bg-blue-700 text-white px-4 py-2 rounded-full hover:bg-blue-900">
                        {{ __('Confirm') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
