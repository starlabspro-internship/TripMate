<div class="fixed w-full  flex bg-white dark:bg-[#0F172A] p-2 items-center justify-between h-16 px-4 sm:px-10 z-[9999]">
    <!-- Logo -->
    <div class="logo ml-2 sm:ml-12 dark:text-white transform ease-in-out duration-500 flex-none h-full flex items-center justify-center text-xl font-semibold">
        TripMate
    </div>

    <!-- Spacer -->
    <div class="grow h-full flex items-center justify-center"></div>

    <div class="flex-none h-full text-center flex items-center space-x-2 sm:space-x-4">
        <!-- Language Selector with Flags and Names -->
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
                <div x-show="open" @click.outside="open = false" class="absolute w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg z-10 max-h-60 overflow-auto">
                    <template x-for="country in countries" :key="country.name">
                        <div @click="selectedCountry = country; open = false" 
                            :class="{ 'hidden': country.name === selectedCountry.name }" 
                            class="cursor-pointer px-4 py-2 hover:bg-gray-100 flex items-center space-x-2">
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

        <!-- Name of the user -->
        <div class="block text-sm md:text-md text-black dark:text-white flex items-center">
            <div class="text-black dark:text-white">{{ Auth::user()->name }}</div>
        
            <!-- Profile Dropdown -->
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white dark:bg-[#0F172A] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div class="-ml-3">
                            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.index')">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                    <a href="{{ route('profile.edit') }}">
                        @if (request()->routeIs('profile.index'))
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Change Preferences') }}
                            </x-dropdown-link>
                        @endif
                    </a>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</div>


