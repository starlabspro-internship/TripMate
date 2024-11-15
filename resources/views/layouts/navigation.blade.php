<div class="fixed w-full flex bg-white dark:bg-[#0F172A] p-2 items-center justify-between h-16 px-4 sm:px-10 z-[9999]">
    <!-- Logo -->
    <div class="logo ml-2 sm:ml-12 dark:text-white transform ease-in-out duration-500 flex-none h-full flex items-center justify-center text-xl font-semibold">
        TripMate
    </div>

    <!-- Spacer -->
    <div class="grow h-full flex items-center justify-center"></div>

    <div class="flex-none h-full text-center flex items-center space-x-2 sm:space-x-4">
        <!-- Language Selector with Flags and Names  -->
        <section>
            <div x-data="{ 
                    open: false, 
                    selectedCountry: { name: 'English', flag: '{{ asset('images/flags/en.png') }}' },
                    countries: [
                        { name: 'English', flag: '{{ asset('images/flags/en.png') }}' },
                        { name: 'Shqip', flag: '{{ asset('images/flags/sq.png') }}' },
                        { name: 'Deutsch', flag: '{{ asset('images/flags/de.png') }}' },
                        { name: 'Français', flag: '{{ asset('images/flags/fr.png') }}' },
                    ],
                    getShortName(name) {
                        return name.slice(0, 2); 
                    }
                }"
                class="relative w-34 mx-auto">
                <!-- Selected Country -->
                <button @click="open = !open" 
                        class="w-full flex justify-between items-center px-2 py-1 bg-gray-100 text-gray-700 rounded-lg border border-gray-300 sm:px-2 sm:py-1 text-lg">
                    <div class="flex items-center space-x-2">
                        <img :src="selectedCountry.flag" alt="" class="w-5 h-auto">
                        <span class="block sm:hidden" x-text="getShortName(selectedCountry.name)"></span>
                        <span class="hidden sm:block" x-text="selectedCountry.name"></span>
                    </div>
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
            
                <!-- Dropdown -->
                <div x-show="open" @click.outside="open = false" class="absolute w-full mt-1 bg-white dark:bg-[#0F172A] border border-gray-300 rounded-lg shadow-lg z-10 max-h-60 overflow-auto">
                    <template x-for="country in countries" :key="country.name">
                        <div @click="selectedCountry = country; open = false" 
                            :class="{ 'hidden': country.name === selectedCountry.name }" 
                            class="cursor-pointer px-4 py-2 hover:bg-gray-200 dark:hover:bg-[#1a1a1a] flex items-center space-x-2 rounded-lg">
                            <img :src="country.flag" alt="" class="w-5 h-auto">
                            <span :class="{'text-sm': country.name !== selectedCountry.name}" class="block sm:hidden" x-text="getShortName(country.name)"></span>
                            <span :class="{'text-sm': country.name !== selectedCountry.name}" class="hidden sm:block text-lg" x-text="country.name"></span>
                        </div>
                    </template>
                </div>
            </div>
        </section>
        
        <!-- User photo -->
        <div class="w-8 h-8 flex mr-4 hidden sm:block">
            @if(auth()->user()->image)
                <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="User Image" class="rounded-full">
            @else
                <img src="{{ 'https://eu.ui-avatars.com/api/?name=' . urlencode(auth()->user()->name . ' ' . auth()->user()->lastname) . '&size=250' }}" alt="Default Image" class="rounded-full">
            @endif
        </div>

        <div x-data="{ open: false }" class="block text-sm md:text-md text-black dark:text-white flex items-center">
            <div class="text-black dark:text-white mr-4">
                <button @click="open = !open" class="cursor-pointer hover:underline text-xl font-semibold text-black dark:text-gray-300"> <!-- Rritur fonti dhe ngjyra -->
                    {{ Auth::user()->name }}
                </button>
            </div>

            <!-- Dropdown Menu -->
            <div x-show="open" @click.outside="open = false" class="absolute mt-2 top-full right-0 w-48 bg-white dark:bg-[#0F172A] border border-gray-300 rounded-lg shadow-xl z-10">
                <x-dropdown-link :href="route('profile.index')" class="px-4 py-2 hover:bg-gray-200 dark:hover:bg-[#1a1a1a] rounded-lg text-md font-medium text-black dark:text-white">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <x-dropdown-link :href="route('profile.edit')" class="px-4 py-2 hover:bg-gray-200 dark:hover:bg-[#1a1a1a] rounded-lg text-md font-medium text-black dark:text-white">
                    {{ __('Change Preferences') }}
                </x-dropdown-link>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="px-4 py-2 hover:bg-gray-200 dark:hover:bg-[#1a1a1a] rounded-lg text-md font-medium text-black dark:text-white">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </div>
            
            <button @click="open = !open" class="-ml-2">
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
        </div>
    </div>
</div>
</div>