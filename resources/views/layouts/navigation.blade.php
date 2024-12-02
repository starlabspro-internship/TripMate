<div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-900 ">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class=" fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-[100] inset-y-0 left-0 w-64 overflow-y-auto transition duration-300 transform bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center mt-8">
                <div class="flex items-center">
                    <img src="{{ asset('storage/landing/tripmate.png') }}" class="flex mx-1 font-mono text-2xl font-bold w-[140px]" href="/" />
                </div>
            </div>
            <nav class="mt-10">
                @if(Auth::user()->isSuperAdmin())
                <a class="flex items-center px-6 py-2 mt-4 {{ Request::routeIs('dashboard') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('dashboard') }}">
                    <img src="{{ asset('storage/icons/dashboard.svg') }}" alt="avatar" class="relative inline-block h-6 w-6 object-cover object-center" />
                    <span class="mx-3">Dashboard</span>
                </a>
                @endif
                <a class="flex items-center px-6 py-2 mt-4 {{ Request::routeIs('profile.index') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('profile.index') }}">
                    <img src="{{ asset('storage/icons/profil.svg') }}" alt="avatar" class="relative inline-block h-6 w-6 object-cover object-center" />
                    <span class="mx-3">Profile</span>
                </a>

                <a class="flex items-center px-6 py-2 mt-4 {{ Request::routeIs('trips.index') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('trips.index') }}">
                    <img src="{{ asset('storage/icons/car.svg') }}" alt="avatar" class="relative inline-block h-6 w-6 object-cover object-center" />
                    <span class="mx-3">Available Rides</span>
                </a>

                <div x-data="{ open: false }" class="mt-4">
                    <div @click="open = !open" class="flex items-center px-6 py-2 cursor-pointer text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                        <img src="{{ asset('storage/icons/book.svg') }}" alt="menu" class="relative inline-block h-6 w-6 object-cover object-center" />
                        <span class="mx-3">Bookings</span>
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 ml-auto" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06 0L10 10.94l3.71-3.73a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 010-1.06z" clip-rule="evenodd" />
                        </svg>
                        <svg x-show="open" :class="open ? 'rotate-180' : 'rotate-0'" xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 ml-auto" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M14.77 12.79a.75.75 0 00-1.06 0L10 16.52 6.29 12.8a.75.75 0 10-1.06 1.06l4.25 4.25a.75.75 0 001.06 0l4.25-4.25a.75.75 0 000-1.06z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div x-show="open" class="pl-12">
                        <a class="flex items-center px-4 py-2 mt-2 {{ Request::routeIs('bookings.index') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('bookings.index') }}">
                            <img src="{{ asset('storage/icons/booking.svg') }}" alt="avatar" class="relative inline-block h-5 w-5 object-cover object-center" />
                            <span class="mx-3 text-sm">My Bookings</span>
                        </a>
                        <a class="flex items-center px-4 py-2 mt-2 {{ Request::routeIs('bookings.myTrips') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('bookings.myTrips') }}">
                            <img src="{{ asset('storage/icons/trips.svg') }}" alt="avatar" class="relative inline-block h-5 w-5 object-cover object-center" />
                            <span class="mx-3 text-sm">My Trips Bookings</span>
                        </a>
                    </div>
                </div>
                    @if(Auth::user()->isSuperAdmin())
                <div x-data="{ open: false }" class="mt-4">
                    <div @click="open = !open" class="flex items-center px-6 py-2 cursor-pointer text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                        <img src="{{ asset('storage/icons/table.svg') }}" alt="menu" class="relative inline-block h-6 w-6 object-cover object-center" />
                        <span class="mx-3">Tables</span>
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 ml-auto" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06 0L10 10.94l3.71-3.73a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 010-1.06z" clip-rule="evenodd" />
                        </svg>
                        <svg x-show="open" :class="open ? 'rotate-180' : 'rotate-0'" xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 ml-auto" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M14.77 12.79a.75.75 0 00-1.06 0L10 16.52 6.29 12.8a.75.75 0 10-1.06 1.06l4.25 4.25a.75.75 0 001.06 0l4.25-4.25a.75.75 0 000-1.06z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div x-show="open" class="pl-12">
                        <a class="flex items-center px-6 py-2 mt-4 {{ Request::routeIs('superadmin.index') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('superadmin.index') }}">
                            <img src="{{ asset('storage/icons/table.svg') }}" alt="avatar" class="relative inline-block h-5 w-5 object-cover object-center" />
                            <span class="mx-3 text-sm">Users, Booking, Trips</span>
                        </a>
                        <a class="flex items-center px-6 py-2 mt-4 {{ Request::routeIs('superadmin.users.index-users') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('superadmin.users.index-users') }}">
                            <img src="{{ asset('storage/icons/verify.svg') }}" alt="avatar" class="relative inline-block h-5 w-5  object-cover object-center" />
                            <span class="mx-3 text-sm">Verifications</span>
                        </a>
                        <a class="flex items-center px-6 py-2 mt-4 {{ Request::routeIs('superadmin.bg-check') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('superadmin.bg-check') }}">
                            <img src="{{ asset('storage/icons/secure.svg') }}" alt="avatar" class="relative inline-block h-5 w-5  object-cover object-center" />
                            <span class="mx-3 text-sm">Background Check</span>
                        </a>
                    </div>
                </div>
                    @endif
                    @if( Auth::user()->isSuperAdmin())
                        <a class="flex items-center px-6 py-2 mt-4 {{ Request::routeIs('superadmin.transactions.index') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}"
                           href="{{ route('superadmin.transactions') }}">
                            <img
                                src="{{ asset('storage/icons/transactions.svg') }}"
                                alt="avatar"
                                class="relative inline-block h-6 w-6  object-cover object-center"
                            />
                            </svg>

                            <span class="mx-3">Transactions</span>
                        </a>
                    @endif
                <a class="flex items-center px-6 py-2 mt-4 {{ Request::routeIs(config('chatify.routes.prefix')) ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route(config('chatify.routes.prefix')) }}">
                    <img src="{{ asset('storage/icons/chat.svg') }}" alt="avatar" class="relative inline-block h-5 w-5 object-cover object-center" />
                    <span class="mx-3">Chat</span>
                </a>
            </nav>
        </div>
        <div class="flex flex-col flex-1 overflow-hidden ">
            <header class="flex items-center justify-between px-6 py-4 bg-white border-b-2 border-gray-800">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex-none h-full text-center flex items-center space-x-4 sm:space-x-4 z-[10]">
                    <div class="relative flex items-center">
                        <!-- Notification Button -->
                        <button id="notificationButton" class="focus:outline-none relative">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bell w-5 h-5" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
                            </svg>
                        </button>

                        <!-- Modal -->
                        <div id="notificationModal" class="absolute top-full left-1/2 transform -translate-x-1/2 mt-2 w-80 bg-white rounded-lg shadow-lg hidden z-10">
                            <!-- Modal Header -->
                            <div class="flex justify-between items-center border-b p-4">
                                <h2 class="text-lg font-semibold">Notifications</h2>
                                <button id="closeModalButton" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                                    &times;
                                </button>
                            </div>
                            <!-- Modal Body -->
                            <div class="p-4">
                                <ul id="notificationList" class="space-y-2 max-h-52 overflow-y-auto">
                                    <li class="p-2 bg-gray-100 rounded">You have a new message.</li>
                                    <li class="p-2 bg-gray-100 rounded">Your trip has been confirmed.</li>
                                    <li class="p-2 bg-gray-100 rounded">Background check approved.</li>
                                    <li class="p-2 bg-gray-100 rounded">Background check approved.</li>
                                    <li class="p-2 bg-gray-100 rounded">Background check approved.</li>
                                    <li class="p-2 bg-gray-100 rounded">Background check approved.</li>
                                    <li class="p-2 bg-gray-100 rounded">Background check approved.</li>
                                    <li class="p-2 bg-gray-100 rounded">Background check approved.</li>
                                    <li class="p-2 bg-gray-100 rounded">Background check approved.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
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
                                    class=" w-full flex justify-between items-center px-2 py-1 bg-gray-100 text-gray-700 rounded-lg border border-gray-300 sm:px-2 sm:py-1 text-sm">
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
                            <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="User Image" class="rounded-full w-8 h-8">
                        @else
                            <img src="{{ 'https://eu.ui-avatars.com/api/?name=' . urlencode(auth()->user()->name . ' ' . auth()->user()->lastname) . '&size=250' }}" alt="Default Image" class="rounded-full w-8 h-8">
                        @endif
                    </div>


                    <div  class=" text-sm md:text-md text-black dark:text-white flex items-center z-[999] ">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex  items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white dark:bg-[#0F172A] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div class="flex items-center space-x-2  -ml-3 ">
                                        <div class="text-black dark:text-white">{{ Auth::user()->name }}</div>
                                        <svg class="fill-current h-5 w-5 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.index')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Change Preferences') }}
                                </x-dropdown-link>

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
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                {{ $slot }}
            </main>
        </div>
    </div>
<script>
    // Modal functionality
    const notificationButton = document.getElementById('notificationButton');
    const notificationModal = document.getElementById('notificationModal');
    const closeModalButton = document.getElementById('closeModalButton');

    notificationButton.addEventListener('click', () => {
        notificationModal.classList.remove('hidden');
    });

    closeModalButton.addEventListener('click', () => {
        notificationModal.classList.add('hidden');
    });


    window.addEventListener('click', (event) => {
        if (event.target !== notificationModal && !notificationButton.contains(event.target)) {
            notificationModal.classList.add('hidden');
        }
    });
</script>
