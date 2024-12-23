<div class="w-full flex flex-col justify-center items-center text-center bg-cover bg-center py-12 relative">
    <!-- Video Background -->
    <video autoplay loop muted playsinline class="hidden md:block absolute inset-0 w-full h-full object-cover">
        <source src="{{ asset('storage/videos/ride.mp4') }}" type="video/mp4">
    </video>

    <video autoplay loop muted playsinline class="block h-[355px] md:hidden w-full object-cover">
        <source src="{{ asset('storage/videos/ride-mobile.mp4') }}" type="video/mp4">
    </video>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 absolute md:relative">

        <div class="flex justify-center items-center w-full">
            <div class="relative h-[320px] md:h-[530px] lg:h-[785px] w-full flex items-center justify-center text-white mx-auto">

                <div class="absolute w-full sm:w-[150%] md:w-[150%] h-48 md:h-60 mt-16 bg-black opacity-50 left-1/2 transform -translate-x-1/2"></div>

                <div class="relative z-10 w-full flex flex-col justify-center items-center text-center px-4">
                    <h2 class="text-sm sm:text-xl md:text-4xl font-bold mb-1 px-4 py-2 text-center mt-20">
                        {{ $title }}
                    </h2>
                    <p class="text-sm sm:text-base md:text-lg mb-10 p-2 mt-4">
                        {{ $description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>