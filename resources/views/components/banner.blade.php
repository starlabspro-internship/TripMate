<div class="w-full flex flex-col justify-center items-center text-center bg-cover bg-center py-12"
    style="background-image: url('{{ asset('storage/images/bg5.png') }}');">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="leading-tight mb-8"></div>

        <div class="flex justify-center items-center w-full">
            <div class="relative h-[400px] w-full flex items-center justify-center text-white mx-auto">
                <div class="absolute w-[150%] sm:w-[180%] md:w-[200%] left-[-20%] sm:left-[-25%] md:left-[-50%] top-0 bottom-0 h-60 mt-16 bg-black opacity-50"></div>
                <div class="relative z-10 w-full flex flex-col justify-center items-center text-center px-50">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-1">
                        {{ $title }}
                    </h2>
                    <p class="text-sm sm:text-base md:text-lg mb-10">
                        {{ $description }}
                    </p>
                    <a href="{{ $buttonLink }}" class="bg-gray-800 bg-opacity-10 backdrop-blur-md shadow-lg inline-block hover:text-white font-medium py-2 px-4 rounded-md flex-shrink-0 mt-2">
                        {{ $buttonText }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
