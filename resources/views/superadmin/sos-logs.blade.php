<x-app-layout>
    <div class=" min-h-screen ">

        <div class="container mx-auto px-4 py-6    ">




            <h1 class="text-3xl font-bold text-white p-6 text-center">{{__('messages.SOS Logs')}}</h1>


            <div id="bookings-container" class="space-y-4">
                @foreach($sosAlerts as $sosAlert)
                    <div class="bg-white shadow-md rounded-lg border border-gray-200 overflow-hidden max-w-4xl mx-auto">
                        <div class="flex justify-between items-center p-4 cursor-pointer bg-gray-50 " onclick="toggleDetails(this)">


                            <!-- Date Section -->
                            <div class="flex flex-col items-center justify-center p-2 border-r border-gray-300">
                                <span class="text-2xl font-bold text-gray-800">{{$sosAlert->created_at->format('d') }}</span>
                                <span class="text-sm text-gray-500">{{ __('messages.' . $sosAlert->created_at->format('M')) }}</span>
                            </div>

                            <!-- Destination -->
                            <div class="flex flex-col flex-grow pl-4">
                                @if($sosAlert->trips)
                                <div class="flex items-center gap-2">
                                    <h3 class="text-lg sm:text-xl font-medium text-gray-900 flex items-center gap-2 mb-1">
                                        {{ $sosAlert->trips->origincity->name }}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 " viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14M12 5l7 7-7 7"/>
                                        </svg>
                                        {{ $sosAlert->trips->destinationcity->name }}
                                    </h3>
                                </div>
                                @endif
                                    <p class="text-sm text-gray-500 flex items-center">
                                        @if ($sosAlert->status === 'pending')
                                            <svg fill="#000000" class="w-6 h-6" viewBox="0 0 32 32" id="icon" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style> .cls-1 { fill: none; } </style> </defs> <circle cx="9" cy="16" r="2"></circle> <circle cx="23" cy="16" r="2"></circle> <circle cx="16" cy="16" r="2"></circle> <path d="M16,30A14,14,0,1,1,30,16,14.0158,14.0158,0,0,1,16,30ZM16,4A12,12,0,1,0,28,16,12.0137,12.0137,0,0,0,16,4Z" transform="translate(0 0)"></path> <rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>" class="cls-1" width="32" height="32"></rect> </g></svg>
                                        @elseif ($sosAlert->status === 'resolved')
                                            <svg fill="#000000" class="w-6 h-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M17.28 9.28a.75.75 0 00-1.06-1.06l-5.97 5.97-2.47-2.47a.75.75 0 00-1.06 1.06l3 3a.75.75 0 001.06 0l6.5-6.5z"></path><path fill-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zM2.5 12a9.5 9.5 0 1119 0 9.5 9.5 0 01-19 0z"></path></g></svg>
                                        @endif
                                        &nbsp;&nbsp;{{ ucfirst(__('messages.' . $sosAlert->status)) }}
                                    </p>
                                    <div id="arrow" class="flex justify-end">
                                        <p class="text-xs italic hover:text-gray-500 text-gray-700 mt-0.5">{{ __('messages.Details for the SOS alert') }}</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 transition-transform duration-300 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M6 9l6 6 6-6" />
                                        </svg>
                                    </div>

                            </div>
                        </div>





                        <div class="details hidden px-4 py-2 text-gray-800 bg-[#c9dde2] ">
<div class="text-center">



</div>
                            <div class="flex flex-wrap justify-between ">

                                <div class="w-full md:w-1/2 ">
                                    <ol class="relative ml-16 mt-4 ">
                                        <li class="mb-5 ms-6">
                                            <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 mt-2 rounded-full -start-4 ring-4 ring-customgreen-500">
                                                <svg fill="#000000" width="24px" height="24px" viewBox="0 -39.69 122.88 122.88" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="enable-background:new 0 0 122.88 43.49" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style> <g> <path class="st0" d="M103.94,23.97c5.39,0,9.76,4.37,9.76,9.76c0,5.39-4.37,9.76-9.76,9.76c-5.39,0-9.76-4.37-9.76-9.76 C94.18,28.34,98.55,23.97,103.94,23.97L103.94,23.97z M23,29.07v3.51h3.51C26.09,30.86,24.73,29.49,23,29.07L23,29.07z M26.52,34.87H23v3.51C24.73,37.97,26.09,36.6,26.52,34.87L26.52,34.87z M20.71,38.39v-3.51H17.2 C17.62,36.6,18.99,37.96,20.71,38.39L20.71,38.39z M17.2,32.59h3.51v-3.51C18.99,29.49,17.62,30.86,17.2,32.59L17.2,32.59z M105.09,29.07v3.51h3.51C108.18,30.86,106.82,29.49,105.09,29.07L105.09,29.07z M108.6,34.87h-3.51v3.51 C106.82,37.97,108.18,36.6,108.6,34.87L108.6,34.87z M102.8,38.39v-3.51h-3.51C99.71,36.6,101.07,37.96,102.8,38.39L102.8,38.39z M99.28,32.59h3.51v-3.51C101.07,29.49,99.71,30.86,99.28,32.59L99.28,32.59z M49.29,12.79c-1.54-0.35-3.07-0.35-4.61-0.28 C56.73,6.18,61.46,2.07,75.57,2.9l-1.94,12.87L50.4,16.65c0.21-0.61,0.33-0.94,0.37-1.55C50.88,13.36,50.86,13.15,49.29,12.79 L49.29,12.79z M79.12,3.13L76.6,15.6l24.13-0.98c2.48-0.1,2.91-1.19,1.41-3.28c-0.68-0.95-1.44-1.89-2.31-2.82 C93.59,1.86,87.38,3.24,79.12,3.13L79.12,3.13z M0.46,27.28H1.2c0.46-2.04,1.37-3.88,2.71-5.53c2.94-3.66,4.28-3.2,8.65-3.99 l24.46-4.61c5.43-3.86,11.98-7.3,19.97-10.2C64.4,0.25,69.63-0.01,77.56,0c4.54,0.01,9.14,0.28,13.81,0.84 c2.37,0.15,4.69,0.47,6.97,0.93c2.73,0.55,5.41,1.31,8.04,2.21l9.8,5.66c2.89,1.67,3.51,3.62,3.88,6.81l1.38,11.78h1.43v6.51 c-0.2,2.19-1.06,2.52-2.88,2.52h-2.37c0.92-20.59-28.05-24.11-27.42,1.63H34.76c3.73-17.75-14.17-23.91-22.96-13.76 c-2.67,3.09-3.6,7.31-3.36,12.3H2.03c-0.51-0.24-0.91-0.57-1.21-0.98c-1.05-1.43-0.82-5.74-0.74-8.23 C0.09,27.55-0.12,27.28,0.46,27.28L0.46,27.28z M21.86,23.97c5.39,0,9.76,4.37,9.76,9.76c0,5.39-4.37,9.76-9.76,9.76 c-5.39,0-9.76-4.37-9.76-9.76C12.1,28.34,16.47,23.97,21.86,23.97L21.86,23.97z"></path> </g> </g></svg>
                                            </span>
                                                    <h3 class="flex items-center mb-1 text-sm text-gray-500  ml-3">{{ __('messages.Driver:') }}</h3>
                                                    <p class="mb-4 text-sm text-gray-900 ml-3">
                                                        {{ $sosAlert->trips->users->name }}
                                                        {{ $sosAlert->trips->users->lastname }}
                                                    </p>
                                                </li>
                                        <li class="mb-5 ms-6">
                                    <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 mt-2 rounded-full -start-4 ring-4 ring-customgreen-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ml-0" width="24px" height="24px" viewBox="0 0 24 24" fill="none">
                                            <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12 6V12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M16.24 16.24L12 12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                            <h3 class="flex items-center mb-1 text-sm text-gray-500  ml-3">{{ __('messages.Alert triggered time:') }}</h3>
                                            <p class="mb-4 text-sm text-gray-900 ml-3">
                                                {{ $sosAlert->created_at->format('H:i - d M') }}
                                            </p>
                                        </li>
                                        @if($sosAlert->status === 'pending')
                                        <li class="mb-5 ms-6">
                                    <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 mt-2 rounded-full -start-4 ring-4 ring-customgreen-500">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier"> <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M12 22C16 18 20 14.4183 20 10C20 5.58172 16.4183 2 12 2C7.58172 2 4 5.58172 4 10C4 14.4183 8 18 12 22Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g>
                                        </svg>
                                    </span>
                                            <h3 class="flex items-center mb-1 text-sm text-gray-500  ml-3">{{ __('messages.Location:') }}</h3>
                                            <p class="mb-4 text-sm text-gray-900 ml-3 flex items-center hover:underline">
                                                <a href="{{'http://localhost:8000/sos-alert/view/' . $sosAlert->id }}" >View Location</a>
                                                <svg class="h-4 w-4" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill=""><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>open-external</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="icon" fill="#000000" transform="translate(85.333333, 64.000000)"> <path d="M128,63.999444 L128,106.666444 L42.6666667,106.666667 L42.6666667,320 L256,320 L256,234.666444 L298.666,234.666444 L298.666667,362.666667 L4.26325641e-14,362.666667 L4.26325641e-14,64 L128,63.999444 Z M362.666667,1.42108547e-14 L362.666667,170.666667 L320,170.666667 L320,72.835 L143.084945,249.751611 L112.915055,219.581722 L289.83,42.666 L192,42.6666667 L192,1.42108547e-14 L362.666667,1.42108547e-14 Z" id="Combined-Shape"> </path> </g> </g> </g></svg>
                                            </p>
                                        </li>
                                        @endif
                                    </ol>
                                </div>


                                <div class="w-full md:w-1/2">

                                    <ol class="relative  ml-16 mt-4">
                                        <li class="mb-5 ms-6">
                                    <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -start-4 mt-2 ring-4 ring-customgreen-500 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ml-0" width="24px" height="24px" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.4" d="M17.9981 7.16C17.9381 7.15 17.8681 7.15 17.8081 7.16C16.4281 7.11 15.3281 5.98 15.3281 4.58C15.3281 3.15 16.4781 2 17.9081 2C19.3381 2 20.4881 3.16 20.4881 4.58C20.4781 5.98 19.3781 7.11 17.9981 7.16Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path opacity="0.4" d="M16.9675 14.4402C18.3375 14.6702 19.8475 14.4302 20.9075 13.7202C22.3175 12.7802 22.3175 11.2402 20.9075 10.3002C19.8375 9.59016 18.3075 9.35016 16.9375 9.59016" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path opacity="0.4" d="M5.96656 7.16C6.02656 7.15 6.09656 7.15 6.15656 7.16C7.53656 7.11 8.63656 5.98 8.63656 4.58C8.63656 3.15 7.48656 2 6.05656 2C4.62656 2 3.47656 3.16 3.47656 4.58C3.48656 5.98 4.58656 7.11 5.96656 7.16Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path opacity="0.4" d="M6.9975 14.4402C5.6275 14.6702 4.1175 14.4302 3.0575 13.7202C1.6475 12.7802 1.6475 11.2402 3.0575 10.3002C4.1275 9.59016 5.6575 9.35016 7.0275 9.59016" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12.0001 14.6302C11.9401 14.6202 11.8701 14.6202 11.8101 14.6302C10.4301 14.5802 9.33008 13.4502 9.33008 12.0502C9.33008 10.6202 10.4801 9.47021 11.9101 9.47021C13.3401 9.47021 14.4901 10.6302 14.4901 12.0502C14.4801 13.4502 13.3801 14.5902 12.0001 14.6302Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9.0907 17.7804C7.6807 18.7204 7.6807 20.2603 9.0907 21.2003C10.6907 22.2703 13.3107 22.2703 14.9107 21.2003C16.3207 20.2603 16.3207 18.7204 14.9107 17.7804C13.3207 16.7204 10.6907 16.7204 9.0907 17.7804Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                            <h3 class="mb-1 text-sm text-gray-500  ml-3">{{ __('messages.Passengers:') }}</h3>
                                            <p class="text-sm font-normal text-gray-900 ml-3">
                                                {{ $sosAlert->trips->bookings->pluck('passenger')->map(function ($passenger) {
                                                    return $passenger->name . ' ' . $passenger->lastname;
                                                })->join(', ') }}
                                            </p>
                                        </li>
                                        <li class="mb-5 ms-6">
                                    <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -start-4 mt-2 ring-4 ring-customgreen-500 ">
                                        <svg version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .linesandangles_een{fill:#111918;} </style> <path class="linesandangles_een" d="M17,6h-2V4h2V6z M25.899,8.515L24.485,7.1l-1.414,1.414l1.414,1.414L25.899,8.515z M8.929,8.515 L7.515,7.1L6.101,8.515l1.414,1.414L8.929,8.515z M26,26h3v2H3v-2h3v-9c0-5.523,4.556-10,10-10s10,4.477,10,10V26z M24,17 c0-4.411-3.589-8-8-8s-8,3.589-8,8v9h16V17z M5,16H3v2h2V16z M27,16v2h2v-2H27z M10,17v7h2v-7c0-2.209,1.791-4,4-4v-2 C12.686,11,10,13.686,10,17z"></path> </g></svg>
                                    </span>
                                            <h3 class="flex items-center mb-1 text-sm text-gray-500  ml-3">{{ __('messages.Triggered By:') }}</h3>
                                            <p class="mb-4 text-sm text-gray-900 ml-3">
                                                {{ $sosAlert->users->name }}
                                                {{ $sosAlert->users->lastname }}
                                            </p>
                                        </li>
                                    </ol>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

            </div>
        </div>
    </div>

    <script >
        function toggleDetails(element) {
            const details = element.nextElementSibling;
            const arrow = element.querySelector('#arrow svg');

            if (details.style.display === 'block') {
                details.style.display = 'none';
                arrow.classList.remove('rotate-180');
            } else {
                details.style.display = 'block';
                arrow.classList.add('rotate-180');
            }
        }
    </script>

</x-app-layout>
