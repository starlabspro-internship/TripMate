<div class="fixed w-full z-30 flex bg-white dark:bg-[#0F172A] p-2 items-center justify-center h-16 px-10">
    <div class = "logo ml-12 dark:text-white  transform ease-in-out duration-500 flex-none h-full flex items-center justify-center">
        TripMate
    </div>
    <!-- SPACER -->
    <div class = "grow h-full flex items-center justify-center"></div>
    <div class = "flex-none h-full text-center flex items-center justify-center">

            <div class = "flex space-x-3 items-center px-3">
                <div class = "flex-none flex justify-center">
                    <a href= {{route('profile.edit')}}>
                        @if (request()->routeIs('profile.index'))
                            <x-secondary-button class="bg-gray-100 hover:scale-105 transition duration-500 hover:bg-gray-200 flex justify-center items-center mr-3">
                                {{ __('Change Preferences') }}
                            </x-secondary-button>
                        @endif

                    </a>
                <div class="w-8 h-8 flex ">

                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShta_GXR2xdnsxSzj_GTcJHcNykjVKrCBrZ9qouUl0usuJWG2Rpr_PbTDu3sA9auNUH64&usqp=CAU" alt="profile" class="hidden sm:block shadow rounded-full object-cover" />
                </div>
                </div>

                <div class = "block text-sm md:text-md text-black dark:text-white">
                    <div class="flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white dark:bg-[#0F172A] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div class = "flex-none flex justify-center hidden">
                                        <div class="w-8 h-8 flex mr-4">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShta_GXR2xdnsxSzj_GTcJHcNykjVKrCBrZ9qouUl0usuJWG2Rpr_PbTDu3sA9auNUH64&usqp=CAU" alt="profile" class="block shadow rounded-full object-cover" />
                                        </div>
                                        </div>
                                    <div class="text-black dark:text-white">{{ Auth::user()->name }}</div>


                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.index')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf


                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>

                            </x-slot>

                        </x-dropdown>

                    </div>
                </div>
            </div>

    </div>
</div>
