<!-- resources/views/components/banner.blade.php -->
<div class="w-full flex flex-col justify-center items-center text-center py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="leading-tight mb-8"></div>

        <div class="gap-8 sm:grid-cols-2 md:grid-cols-3">
            <!-- resources/views/components/banner.blade.php -->
            <div class="relative h-[300px] w-[100%] flex items-center justify-center bg-cover bg-center text-white mx-auto"> <!-- Increased height and width -->
                <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Background overlay for readability -->

                <!-- Banner Content -->
                <div class="relative z-10 w-screen justify-between items-center text-center">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold flex-shrink-0 mb-1">Welcome to Our Platform</h2>
                    <p class="text-sm sm:text-base md:text-lg flex-shrink-0 hidden sm:block mb-10">Discover new experiences with us.</p>

                    <!-- Button -->
                    <a href="/about" class="inline-block backdrop-blur-sm bg-white/30 hover:text-white font-medium py-2 px-4 rounded-md flex-shrink-0 mt-2">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

