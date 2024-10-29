
<nav x-data="{ open: false }" class="fixed top-0 left-0 right-0 md:left-10 md:right-10 flex justify-between items-center px-5 py-3 bg-white mx-auto ">
    <img class="h-10" src="{{ Vite::asset('resources/images/tripmate.png') }}" alt="...">
    <div :class="{'h-fit': open, 'h-0': ! open}" class="absolute bg-white top-14 overflow-hidden left-0 w-full px-5 md:relative md:h-fit md:top-0">
        <ul class="">
            <li class="space-x-3 flex w-full flex-col gap-4 py-4 md:py-0 md:flex-row md:justify-center ">
                <a id="section1" class="hover:text-gray-500 font-medium" href="/#">Home</a>
                <a id="section2" class="hover:text-gray-500 font-medium" href="/#">Rides</a>
                <a id="section3" class="hover:text-gray-500 font-medium" href="/#">My Trips</a>
                <a id="section4" class="hover:text-gray-500 font-medium" href="/#">Notifications</a>
                <a id="section5" class="hover:text-gray-500 font-medium" href="/#">Profil</a>
            </li>
        </ul>
    </div>
    <div class="flex md:justify-end">
        <button 
            onclick="location.href='{{ route('login') }}'" 
            class="bg-blue-500 text-white border-2 border-blue-500 hover:bg-blue-600 hover:border-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 font-medium py-2 px-4 rounded-lg transition duration-200 ease-in-out">
            LogIn
        </button>
    </div>
    <img @click="open = ! open" src="{{ Vite::asset('resources/images/hamburger-icon.svg') }}" class="text-3xl cursor-pointer md:hidden"></img>
</nav>