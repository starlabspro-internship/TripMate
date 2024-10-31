@guest
<x-app-layout>
    <div class="w-full  flex flex-col justify-center items-center text-center bg-cover bg-center py-12"
        style="background-image: url('/storage/images/download.jpeg');">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="leading-tight mb-8"></div>
            {{-- banners --}}
            <div class=" gap-6 sm:grid-cols-2 md:grid-cols-3">
                <x-banner
                    title="Welcome to Our Platform"
                    description="Discover new experiences with us."
                    background-image="{{ asset('storage/images/download.jpeg') }}"
                    button-text="Learn More"
                    button-link="/about"
                />
            </div>
        </div>
    </div>
        <!-- icons -->
        <div class="flex items-center justify-center py-12  bg-gray-50">
            <div class="flex flex-col md:flex-row justify-center items-center space-y-8 md:space-y-0 md:space-x-12 lg:space-x-28">
                <!-- Verified Icon -->
                <div class="text-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="url(#verifiedGradient)" class="w-12 h-12 md:w-16 md:h-16 mx-auto">
                        <defs>
                            <linearGradient id="verifiedGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#0000FF; stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#00FFFF; stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="text-lg md:text-xl font-semibold mt-4">Verifikimi i anëtarëve</h3>
                    <p class="text-gray-500 text-sm mt-2">Verifiko profilin për ta rritur<br>besueshmërinë në komunitet</p>
                </div>

                <!-- Star Rating Icon -->
                <div class="text-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="url(#starGradient)" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="w-12 h-12 md:w-16 md:h-16 mx-auto">
                        <defs>
                            <linearGradient id="starGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#0000FF; stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#00FFFF; stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                    </svg>
                    <h3 class="text-lg md:text-xl font-semibold mt-4">Vlerëso udhëtimet</h3>
                    <p class="text-gray-500 text-sm mt-2">Vlerësoni bashkudhëtarët <br> pas cdo udhëtimi <br></p>
                </div>

                <!-- Report Icon -->
                <div class="text-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="url(#infoGradient)" class="w-12 h-12 md:w-16 md:h-16 mx-auto">
                        <defs>
                            <linearGradient id="infoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#0000FF; stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#00FFFF; stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    <h3 class="text-lg md:text-xl font-semibold mt-4">Raporto</h3>
                    <p class="text-gray-500 text-sm mt-2">Ju mund t'i raportoni<br>personat e papërgjegjshëm</p>
                </div>
            </div>
        </div>
</x-app-layout>
@endguest
>>>>>>> Stashed changes
