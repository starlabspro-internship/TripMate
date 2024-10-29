<!-- resources/views/components/banner.blade.php -->
<div class="relative h-[60vh] flex items-center justify-center bg-cover bg-center text-white" style="background-image: url('{{ asset($imagePath) }}');">
    <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Background overlay for readability -->

    <!-- Banner Content -->
    <div class="relative z-10 text-center px-4 md:px-8 lg:px-12 space-y-4 max-w-2xl">
        <h2 class="text-4xl md:text-5xl font-bold"><h3>Title: </h3>{{ $title }}</h2>
        <p class="text-lg md:text-xl leading-relaxed"><h4>Description: </h4>{{ $description }}</p>

        <!-- Button -->
        @if($buttonText && $buttonLink)
            <a href="{{ $buttonLink }}" class="inline-block bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg shadow hover:bg-blue-700 transition-colors">
                <h4>Text: </h4>{{ $buttonText }}
            </a>
        @endif
    </div>
</div>
