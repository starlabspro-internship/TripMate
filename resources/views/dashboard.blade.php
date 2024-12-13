<x-app-layout>
    <div class="container px-6 py-8 mx-auto">
        <div class="text-center bg-white p-6 rounded-md shadow-sm mb-6">
            <h1 class="text-4xl font-bold text-blue-700">{{ __('messages.Welcome') }} , {{ Auth::user()->name }}!</h1>
            <p class="text-lg text-gray-600 mt-2">{{ __('messages.Start your journey, one trip at a time!') }}</p>
        </div>

        <div class="mt-4">
            <div class="flex flex-wrap -mx-6">
                <!-- Total Users -->
                <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                        <div class="p-3 bg-blue-600 bg-opacity-75 rounded-full">
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
                        <div class="p-3 bg-blue-600 bg-opacity-75 rounded-full">
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
                        <div class="p-3 bg-blue-600 bg-opacity-75 rounded-full">
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
            <div>
                <div class="mt-8">
                    <h3 class="text-2xl font-medium text-gray-700 mb-4">{{ __('messages.Analytics') }}</h3>
                    <div class="flex space-x-4">
                        <!-- First Chart -->
                        <div class="flex-1 bg-white p-6 rounded-md shadow-sm">
                            <canvas id="myChart"  style="max-width: 400px; height: 300px;"></canvas>
                        </div>
                        <!-- Second Chart -->
                        <div class="flex-1 bg-white p-6 rounded-md shadow-sm justify-center">
                            <canvas id="myChart1"  style="max-width: 400px; height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex mt-8 gap-4">
                <!-- Map Section -->
                <div class="w-full md:w-2/3 lg:w-3/5 bg-white p-3 rounded-md">
                    <h3 class="text-2xl font-medium text-gray-700 mb-4">{{ __('messages.Map of Kosovo') }}</h3>
                    <div id="map" class="w-full h-96 rounded-md shadow-sm"></div>
                </div>

                <!-- Transactions Section -->

                <div class="w-full md:w-1/3 lg:w-2/5 bg-white rounded-md shadow-sm p-4">
                <a href="{{ route('superadmin.transactions') }}">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">{{ __('messages.Recent Transactions') }}</h3>
                </a>
                    <div class="overflow-y-auto max-h-[380px]">
                        <table class="w-full border border-gray-200 rounded-md shadow-md overflow-hidden">
                            <thead>
                                <tr class="rounded-sm bg-gray-100 dark:bg-meta-4">
                                    <th class="border-b border-gray-300 px-4 py-3 text-left">{{ __('messages.Transactions') }}</th>
                                    <th class="border-b border-gray-300 px-4 py-3 text-center">{{ __('messages.Amount') }}</th>
                                    <th class="border-b border-gray-300 px-4 py-3 text-center">{{ __('messages.Date') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <!-- Example Rows (Replace with Dynamic Data) -->
                                @if($transactions->isEmpty())
                                <tr>
                                    <td colspan="3" class="text-center text-gray-600">{{ __('messages.No transactions available.') }}</td>
                                </tr>
                                @else
                                @foreach($transactions as $transaction)
                                <tr>
                                    @if($transaction->status === 'paid' || $transaction->status === 'refunded')
                                    <td class="text-left">
                                        <span class="ml-4 text-md my-4 text-gray-600 dark:text-white/80">
                                            {{ $transaction->trip->origincity->name }} {{__('messages.to')}} {{ $transaction->trip->destinationcity->name }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span
                                        class="flex justify-center my-4
                                        {{ $transaction->status === 'paid' ? 'text-green-500' : 'text-red-500' }}">
                                        {{ $transaction->status === 'paid' ? '+' : '-' }}{{ $transaction->total_price }}€
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="flex justify-center my-4 text-sm text-gray-600 dark:text-white/80">
                                            {{ $transaction->created_at->format('M d, Y') }}
                                        </span>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>


            </div>
        </div>
    </div>


    <!-- Map Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const map = L.map("map", {
                minZoom: 8, // Minimum zoom level
                maxZoom: 9, // Maximum zoom level
            }).setView([42.6026, 20.9020], 8);

            // Add tile layer
            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap contributors</a>',
            }).addTo(map);

            // Restrict bounds to Kosovo
            const kosovoBounds = [
                [41.8571, 19.9800], // Southwest corner of Kosovo
                [43.2575, 21.9400], // Northeast corner of Kosovo
            ];
            map.setMaxBounds(kosovoBounds); // Set the map bounds
            map.on("drag", function () {
                map.panInsideBounds(kosovoBounds, { animate: true }); // Prevent dragging out of bounds
            });

            // Add city markers
            const cities = [
                { name: "Pristina", coords: [42.6629, 21.1655], users: 150 },
                { name: "Prizren", coords: [42.2150, 20.7420], users: 100 },
                { name: "Peja", coords: [42.6591, 20.2885], users: 75 },
                { name: "Ferizaji", coords: [42.3800, 21.1578], users: 75 },
                { name: "Gjilani", coords: [42.4614, 21.4681], users: 75 },
                { name: "Gjakova", coords: [42.3800, 20.4308], users: 50 },
                { name: "Mitrovica", coords: [42.8900, 20.8683], users: 120 },
            ];

            cities.forEach((city) => {
                L.marker(city.coords)
                    .addTo(map)
                    .bindPopup(
                        `<strong>${city.name}</strong><br>Users: ${city.users}`
                    );
            });
        });

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // First Chart (Bar Chart)
            const ctx1 = document.getElementById('myChart').getContext('2d');
            const data1 = {
                labels: ['Users', 'Trips', 'Bookings'],
                datasets: [{
                    label: 'Count',
                    data: [{{ $totalUsers }}, {{ $totalTrips }}, {{ $totalBookings }}], // Dynamically populated
                    backgroundColor: [
                        '#4682B4', // Users
                        '#FFBF00', // Trips
                        '#FF7F50', // Bookings
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
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };
            new Chart(ctx1, config1);

            // Second Chart (Pie Chart)
            const ctx2 = document.getElementById('myChart1').getContext('2d');

            // Data for the chart
            const data2 = {
                labels: ['Users', 'Trips', 'Bookings'],
                datasets: [{
                    label: 'Distribution',
                    data: [{{ $totalUsers }}, {{ $totalTrips }}, {{ $totalBookings }}], // Replace with dynamic data
                    backgroundColor: [
                        '#4682B4', // Teal Blue for Users
                        '#FFBF00', // Warm Amber for Trips
                        '#FF7F50', // Muted Coral for Bookings
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
