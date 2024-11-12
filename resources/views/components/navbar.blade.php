<nav x-data="{ open: false }" class="fixed top-0 left-0 right-0 lg:left-10 lg:right-10 text-white flex justify-between md:bg-gray-400 md:bg-opacity-50 bg-gray-500 items-center lg:px-5 py-3  bg-opacity-50 backdrop-blur-lg shadow-lg rounded-lg mx-auto z-50">
    <a class="mx-2 font-mono text-2xl font-bold " href="/">TripMate</a>
    <div :class="{'h-fit': open, 'h-0': ! open}" class="absolute w-full  bg-gray-500 bg-opacity-50 md:bg-opacity-0  rounded-xl mt-2 md:mt-1 top-14 overflow-hidden   md:relative md:h-fit md:top-0">
        <ul class=" flex text-md lg:text-lg flex-col gap-4 py-4 px-4 md:py-0  md:flex-row md:justify-center md:gap-0 ">
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
                <li class=" md:hidden">
                    <button 
                        onclick="location.href='{{ route('login') }}'" 
                        class="mx-3 whitespace-nowrap w-1/3 bg-opacity-30 bg-blue-400 hover:bg-blue-300 border-solid hover:font-bold text-white border-2 shadow-md hover:shadow-gray-600  focus:outline-none focus:ring-2  focus:ring-opacity-50 font-medium py-2 px-4 rounded-2xl transition duration-200 ease-in-out">
                        Log In
                    </button>
                </li>
                <li class=" md:hidden">
                    <button 
                        onclick="location.href='{{ route('register') }}'" 
                        class="mx-3 whitespace-nowrap w-1/2 bg-opacity-30 bg-green-400 hover:bg-green-300 border-solid hover:font-bold text-white border-2 shadow-md hover:shadow-gray-600  focus:outline-none focus:ring-2 focus:ring-opacity-50 font-medium py-2 px-4 rounded-2xl transition duration-200 ease-in-out">
                        Register
                    </button>
                </li>
        </ul>
    </div>
    <div class="flex  md:justify-end">
        <div class="hidden md:flex">
            <button 
                onclick="location.href='{{ route('login') }}'" 
                class="mx-3 whitespace-nowrap border-solid hover:font-bold text-white border-2 shadow-md hover:shadow-gray-600  focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 font-medium py-2 px-4 rounded-2xl transition duration-200 ease-in-out">
                Log In
            </button>
            <button 
                onclick="location.href='{{ route('register') }}'" 
                class="mx-3 whitespace-nowrap border-solid hover:font-bold text-white border-2 shadow-md hover:shadow-gray-600  focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50 font-medium py-2 px-4 rounded-2xl transition duration-200 ease-in-out">
                Register
            </button>
        </div>
        <img @click="open = ! open" src="{{ Vite::asset('resources/images/hamburger-icon.svg') }}" class="text-3xl pr-5 cursor-pointer md:hidden"></img>
    </div>
</nav>
