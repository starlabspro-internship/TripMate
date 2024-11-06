
<nav x-data="{ open: false }" class="fixed top-0 left-0 right-0 md:left-10 md:right-10 text-white flex justify-between  items-center px-5 py-3 md: bg-gray-800 bg-opacity-10 backdrop-blur-md shadow-lg rounded-lg mx-auto z-50">
    <a class="mx-2 font-mono text-2xl font-bold " href="/">TripMate</a>
    <div :class="{'h-fit': open, 'h-0': ! open}" class="absolute w-full  bg-gray-900 bg-opacity-10 backdrop-blur-xl shadow-lg rounded-lg mt-4 md:mt-1 top-14 overflow-hidden  right-px px-5 md:relative md:h-fit md:top-0">
        <ul class=" flex text-lg  flex-col gap-4 py-4 md:py-0 md:flex-row md:justify-center md:gap-0 ">
                <li class="mx-3">
                    <a id="section1" class=" hover:text-white font-medium" href="/#">Home</a>
                </li>
                <li class="mx-2">
                    <a id="section2" class=" hover:text-white font-medium" href="/#">Rides</a>
                </li>
                <li class="mx-2">
                    <a id="section3" class=" hover:text-white font-medium" href="/#">My Trips</a>
                </li>
                <li class="mx-2">
                    <a id="section4" class=" hover:text-white font-medium" href="/#">Notifications</a>
                </li>
                <li class="mx-2">
                    <a id="section5" class=" hover:text-white font-medium" href="/#">Profil</a>
                 </li>
        </ul>
    </div>
    <div class="flex  md:justify-end">
        <button 
            onclick="location.href='{{ route('login') }}'" 
            class="mx-3 bg-sky-700 text-white border-2 border-sky-700 hover:bg-blue-600 hover:border-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 font-medium py-2 px-4 rounded-lg transition duration-200 ease-in-out">
            LogIn
        </button>
        <img @click="open = ! open" src="{{ Vite::asset('resources/images/hamburger-icon.svg') }}" class="text-3xl  cursor-pointer md:hidden"></img>
    </div>
</nav>