<x-app-layout>
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-extrabold text-center text-blue-900 mb-8">{{ __('messages.Scan QR-Code') }}</h1>
        <div class="section ring-4 ring-blue-500 bg-gradient-to-br from-purple-100 via-blue-100 to-indigo-100 p-8 rounded-2xl shadow-lg border-2 border-white">
            <div id="my-qr-reader" class="w-full h-[450px] bg-white border border-gray-300 rounded-lg flex flex-col lg:flex-row items-center justify-center shadow-xl hover:shadow-2xl transition-shadow duration-300">
                <span class="text-gray-500 text-lg">{{ __('messages.Scan QR-Code') }}</span>
            </div>
        </div>
    </div>
</x-app-layout>