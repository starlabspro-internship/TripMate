<div class="w-full flex flex-col justify-center items-center text-center bg-cover bg-center py-12"
    style="background-image: url('{{ asset('storage/images/b.jpg') }}');">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="leading-tight mb-8"></div>

        <div class="flex justify-center items-center w-full"> 
            <div class="relative h-[400px] w-full flex items-center justify-center text-white mx-auto"> 
                <div class="absolute w-full sm:w-[150%] md:w-[150%] h-60 mt-16 bg-black opacity-50 left-1/2 transform -translate-x-1/2 "></div>
                <div class="relative z-10 w-full flex flex-col justify-center items-center text-center px-50">
                    <h2 class="text-sm sm:text-xl md:text-4xl font-bold mb-1 px-4 py-2 text-center mt-20">
                        {{ $title }}
                    </h2>
                    <p class="text-sm sm:text-base md:text-lg mb-10 p-2 mt-4">
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
