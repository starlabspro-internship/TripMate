<x-app-layout>
    <div class="container px-6 py-8 mx-auto">
        <div class="text-center bg-white p-6 rounded-md shadow-sm mb-6">
            <h1 class="text-4xl font-bold text-customgreen-500">{{ __('messages.Welcome') }} , {{ Auth::user()->name }}!</h1>
            <p class="text-lg text-gray-600 mt-2">{{ __('messages.Efficiently oversee and manage your platform with precision and control!') }}</p>
         </div>

        <div class="mt-4">
            <div class="flex flex-wrap -mx-6">
                <!-- Total Users -->
                <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">

                        <div class="p-3 bg-indigo-600 bg-opacity-75 rounded-full">
                            <img src="{{ asset('storage/icons/users.svg') }}" alt="Users" class="h-6 w-6"/>
                        </div>
                        <div class="mx-5">
                            <a href="{{ route('superadmin.index') }}">
                                <h4 class="text-2xl font-semibold text-gray-700">{{$totalUsers}}</h4>
                                <div class="text-gray-500">{{ __('messages.Total Users') }}</div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Total Trips -->
                <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                        <div class="p-3 bg-indigo-600 bg-opacity-75 rounded-full">
                            <img src="{{ asset('storage/icons/road.svg') }}" alt="Trips" class="h-6 w-6"/>
                        </div>
                        <div class="mx-5">
                            <a href="{{ route('superadmin.index', ['tab' => 'trips']) }}">
                                <h4 class="text-2xl font-semibold text-gray-700">{{$totalTrips}}</h4>
                                <div class="text-gray-500">{{ __('messages.Total Trips') }}</div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Total Bookings -->
                <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                        <div class="p-3 bg-indigo-600 bg-opacity-75 rounded-full">
                            <img src="{{ asset('storage/icons/cars.svg') }}" alt="Bookings" class="h-6 w-6"/>
                        </div>
                        <div class="mx-5">
                            <a href="{{ route('superadmin.index', ['tab' => 'bookings']) }}">
                                <h4 class="text-2xl font-semibold text-gray-700">{{$totalBookings}}</h4>
                                <div class="text-gray-500">{{ __('messages.Total Bookings') }}</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <div class="flex flex-wrap -mx-6">

                </div>
            </div>
            <div class="mt-8">
                <h3 class="text-2xl font-medium text-white mb-6">{{ __('messages.Analytics') }}</h3>
                <div class="flex flex-col md:flex-row md:space-x-6 space-y-6 md:space-y-0">
                    <!-- First Chart -->
                    <div class="flex-1 bg-white p-6 rounded-lg shadow-md">
                        <canvas id="myChart" class="w-full h-64 md:h-80"></canvas>
                    </div>
                    <!-- Second Chart -->
                    <div class="flex-1 bg-white p-6 rounded-lg shadow-md">
                        <canvas id="myChart1" class="w-full h-64 md:h-80"></canvas>
                    </div>
                </div>
            </div>
            <div class="flex mt-8 gap-4 ">
                <!-- Map Section -->
                <div class="w-full  bg-white p-3 rounded-md">
                    <h3 class="text-2xl font-medium text-gray-700 mb-4">{{ __('messages.Map of Kosovo') }}</h3>
                    <div id="map" class="w-full h-96 rounded-md shadow-sm"></div>
                </div>
            </div>
        </div>
    </div>


    <!-- Map Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var map = L.map('map').setView([42.5269444444, 21.0072222222], 8);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 10,
                minZoom: 8,
            }).addTo(map);
            const customIcon = L.divIcon({
                className: 'custom-svg-icon',
                html: `
                    <svg width="30px" height="30px" viewBox="-3.12 -3.12 30.24 30.24" xmlns="http://www.w3.org/2000/svg" fill="#477fb3" stroke="#0f97ff" transform="matrix(1, 0, 0, 1, 0, 0)" stroke-width="0.00024000000000000003">
                        <g id="SVGRepo_iconCarrier">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M17.084 15.812a7 7 0 1 0-10.168 0A5.996 5.996 0 0 1 12 13a5.996 5.996 0 0 1 5.084 2.812zM12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zM12 12a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path>
                        </g>
                    </svg>
                `,
                iconSize: [40, 40],
                iconAnchor: [15, 15],
            });

            fetch('/cities-with-user-count')
                .then(response => response.json())
                .then(cities => {
                    cities.forEach(city => {
                        if (city.name && city.latitude && city.longitude && city.users_count > 0) {
                            let coordinates = [parseFloat(city.latitude), parseFloat(city.longitude)];
                            L.marker(coordinates, { icon: customIcon })
                                .addTo(map)
                                .bindPopup(`
                                    <div class="p-2 bg-gray-100 border border-gray-300 rounded-lg shadow-md">
                                        <h3 class="text-sm font-bold text-gray-800">${city.name}</h3>
                                        <h4 class="text-sm text-gray-600">{{ __('messages.Users:') }} <span class="text-blue-600 font-medium">${city.users_count}</span></h4>
                                    </div>
                                `);
                        }
                    });
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx1 = document.getElementById('myChart').getContext('2d');
            const data1 = {
                labels: ['{{ __('messages.Verified Users with ID') }}', '{{ __('messages.Unverified Users') }}'],
                datasets: [{
                    label: 'Count',
                    data: [
                        {{ $verifiedUsers }},
                        {{ $nullStatusUsers }},
                    ],
                    backgroundColor: [
                        '#90DB89',
                        '#FF6347',
                    ],
                    borderWidth: 1
                }]
            };
            const config1 = {
                type: 'polarArea',
                data: data1,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        }
                    }
                }
            };
            new Chart(ctx1, config1);

            // Second Chart (Pie Chart)
            const ctx2 = document.getElementById('myChart1').getContext('2d');

            // Data for the chart
            const data2 = {
                labels: ['{{ __('messages.Users') }}','{{ __('messages.Trips') }}','{{ __('messages.Bookings') }}'],
                datasets: [{
                    label: 'Distribution',
                    data: [{{ $totalUsers }}, {{ $totalTrips }}, {{ $totalBookings }}], // Replace with dynamic data
                    backgroundColor: [
                        '#607ADB', // Teal Blue for Users
                        '#FFBF00', // Warm Amber for Trips
                        '#39CEDB', // Muted Coral for Bookings
                    ],
                    hoverOffset: 4
                }]
            };

            // Chart configuration
            const config2 = {
                type: 'doughnut',
                data: data2,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        }
                    }
                }
            };

            // Create chart
            new Chart(ctx2, config2);
        });
    </script>

</x-app-layout>

