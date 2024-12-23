
<div id="services" class="mt-12 py-1.5 scroll-mt-10">
    <h1 class="font-sans font-bold text-5xl text-center pt-12 mb-12">Our Services</h1>
    <div class="flex flex-col gap-14 justify-center items-center mx-4 sm:flex-row sm:flex-wrap md:flex-row sm:gap-8 md:gap-16">
        <div style="box-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px, rgba(0, 0, 0, 0.1) 0px 2px 4px 0px, rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;"
        <div class="max-w-sm lg:w-1/4 bg-white border border-grey-200 rounded-xl transition duration-700 ease-in-out hover:scale-105 hover:shadow-lg dark:bg-gray-800 dark:border-gray-700 px-2 py-4 lg:max-h-54 xl:max-h-[420px] ">
                <img class="object-contain rounded-t-lg w-96 h-44" src="{{ asset('storage/landing/saving.png') }}" alt="" />
            <div class="p-5">
                    <h5 class="mb-2 pt-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white lg:text-xl xl:text-2xl">Save Time and Money</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Discover efficient and cost-effective travel options to make the most of your trips.</p>
                <div class="flex gap-4 justify-center" >
                    <a href="{{route('trips.index')}}">
                        <button class="bg-blue-500 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-xl ">
                            Passengers
                        </button>
                    </a>
                    <a href="{{route('trips.create')}}">
                        <button class="bg-blue-500 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-xl">
                            Drivers
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div style="box-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px, rgba(0, 0, 0, 0.1) 0px 2px 4px 0px, rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;"
        <div class="max-w-sm lg:w-1/4 bg-white border border-gray-200 rounded-xl shadow transition duration-700 ease-in-out hover:scale-105 hover:shadow-lg dark:bg-gray-800 dark:border-gray-700 px-2 py-4 lg:max-h-54 xl:max-h-[420px] ">
                <img class="object-cover rounded-t-lg w-96 h-44" src="{{ asset('storage/landing/ctc2.png') }}" alt="" />
            <div class="p-5">
                    <h5 class="mb-2 pt-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">City to City</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Seamless intercity travel solutions that connect you with destinations efficiently.</p>
                <div class="flex gap-4 justify-center">
                    <a href="{{route('trips.index')}}">
                        <button class="bg-blue-500 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-xl ">
                            Passengers
                        </button>
                    </a>
                    <a href="{{route('trips.create')}}">
                        <button class="bg-blue-500 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-xl">
                            Drivers
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div style="box-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px, rgba(0, 0, 0, 0.1) 0px 2px 4px 0px, rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;"
        <div class="max-w-sm lg:w-1/4 bg-white border border-gray-200 rounded-xl shadow transition duration-700 ease-in-out hover:scale-105 hover:shadow-lg dark:bg-gray-800 dark:border-gray-700 px-2 py-4 lg:max-h-54 xl:max-h-[420px]">
                <img class="object-contain rounded-t-lg w-96 h-44" src="{{ asset('storage/landing/save-money.png') }}" alt="" />
            <div class="p-5">
                    <h5 class="mb-2 pt-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Make Money</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Earn by driving or by sharing rides, turning every trip into an opportunity for profit.</p>
                    <a href="{{route('trips.create')}}">
                        <button class="bg-blue-500 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-xl">
                            Drivers
                        </button>
                    </a>
            </div>
        </div>
    </div>
</div>
