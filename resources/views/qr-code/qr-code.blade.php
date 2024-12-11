<x-app-layout>
    <div class="m-[20px] md:max-w-xl md:mx-auto md:mt-[100px] ring-4 ring-blue-500 bg-gradient-to-br from-purple-100 via-blue-100 to-indigo-100 p-8 rounded-2xl shadow-lg">
        <h1 class="text-xl font-semibold text-center mb-6 text-gray-800">{{ $user->name }} {{ $user->lastname }} QR Code</h1>
        
        <div class="text-center mb-8">            
            <div class="flex justify-center">
                <div class="bg-white p-6 border-4 border-blue-300 rounded-xl shadow-2xl transform">
                    {!! $qrCode !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>