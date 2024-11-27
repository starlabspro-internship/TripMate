<x-app-layout>
    <div class="container px-6 py-8 mx-auto">
        <div class="text-center bg-white p-6 rounded-md shadow-sm mb-6">
            <h1 class="text-4xl font-bold text-blue-700">Welcome, {{ Auth::user()->name }}!</h1>
            <p class="text-lg text-gray-600 mt-2">"Start your journey, one trip at a time!"</p>
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
                                <div class="text-gray-500">Total Users</div>
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
                                <div class="text-gray-500">Total Trips</div>
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
                                <div class="text-gray-500">Total Bookings</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex flex-wrap -mx-6">

                    <!-- New Section 2: Pending Verifications -->
                    <div class="w-full px-6 mt-6 sm:w-1/2  xl:mt-0">
                        <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                            <div class="p-3 bg-yellow-600 bg-opacity-75 rounded-full">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill-rule="evenodd" clip-rule="evenodd" d="m20.215 2.387-8.258 10.547-2.704-3.092a1 1 0 1 0-1.506 1.316l3.103 3.548a1.5 1.5 0 0 0 2.31-.063L21.79 3.62a1 1 0 1 0-1.575-1.233zM20 11a1 1 0 0 0-1 1v6.077c0 .459-.021.57-.082.684a.364.364 0 0 1-.157.157c-.113.06-.225.082-.684.082H5.923c-.459 0-.57-.022-.684-.082a.363.363 0 0 1-.157-.157c-.06-.113-.082-.225-.082-.684V5.5a.5.5 0 0 1 .5-.5l8.5.004a1 1 0 1 0 0-2L5.5 3A2.5 2.5 0 0 0 3 5.5v12.577c0 .76.082 1.185.319 1.627.224.419.558.753.977.977.442.237.866.319 1.627.319h12.154c.76 0 1.185-.082 1.627-.319.42-.224.754-.558.978-.977.236-.442.318-.866.318-1.627V12a1 1 0 0 0-1-1z" fill="#000000"></path></g></svg>
                            </div>
                            <div class="mx-5">
                                <a href="{{ route('superadmin.index', ['tab' => 'verifications']) }}">
                                    <h4 class="text-2xl font-semibold text-gray-700">To Do List</h4>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- New Section 3: Cancelled Trips -->
                    <div class="w-full px-6 mt-6 sm:w-1/2 xl:mt-0">
                        <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                            <div class="p-3 bg-red-600 bg-opacity-75 rounded-full">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 1C17.6569 1 19 2.34315 19 4C19 4.55228 18.5523 5 18 5C17.4477 5 17 4.55228 17 4C17 3.44772 16.5523 3 16 3H4C3.44772 3 3 3.44772 3 4V20C3 20.5523 3.44772 21 4 21H16C16.5523 21 17 20.5523 17 20V19C17 18.4477 17.4477 18 18 18C18.5523 18 19 18.4477 19 19V20C19 21.6569 17.6569 23 16 23H4C2.34315 23 1 21.6569 1 20V4C1 2.34315 2.34315 1 4 1H16Z" fill="#0F0F0F"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M20.7991 8.20087C20.4993 7.90104 20.0132 7.90104 19.7133 8.20087L11.9166 15.9977C11.7692 16.145 11.6715 16.3348 11.6373 16.5404L11.4728 17.5272L12.4596 17.3627C12.6652 17.3285 12.855 17.2308 13.0023 17.0835L20.7991 9.28666C21.099 8.98682 21.099 8.5007 20.7991 8.20087ZM18.2991 6.78666C19.38 5.70578 21.1325 5.70577 22.2134 6.78665C23.2942 7.86754 23.2942 9.61999 22.2134 10.7009L14.4166 18.4977C13.9744 18.9398 13.4052 19.2327 12.7884 19.3355L11.8016 19.5C10.448 19.7256 9.2744 18.5521 9.50001 17.1984L9.66448 16.2116C9.76728 15.5948 10.0602 15.0256 10.5023 14.5834L18.2991 6.78666Z" fill="#0F0F0F"></path> <path d="M5 7C5 6.44772 5.44772 6 6 6H14C14.5523 6 15 6.44772 15 7C15 7.55228 14.5523 8 14 8H6C5.44772 8 5 7.55228 5 7Z" fill="#0F0F0F"></path> <path d="M5 11C5 10.4477 5.44772 10 6 10H10C10.5523 10 11 10.4477 11 11C11 11.5523 10.5523 12 10 12H6C5.44772 12 5 11.5523 5 11Z" fill="#0F0F0F"></path> <path d="M5 15C5 14.4477 5.44772 14 6 14H7C7.55228 14 8 14.4477 8 15C8 15.5523 7.55228 16 7 16H6C5.44772 16 5 15.5523 5 15Z" fill="#0F0F0F"></path> </g></svg>
                            </div>
                            <div class="mx-5">
                                <a href="{{ route('superadmin.index', ['tab' => 'cancelled']) }}">
                                    <h4 class="text-2xl font-semibold text-gray-700">Feedbacks</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="mt-8">
                    <h3 class="text-2xl font-medium text-gray-700 mb-4">Analytics</h3>
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
                    <h3 class="text-2xl font-medium text-gray-700 mb-4">Map of Kosovo</h3>
                    <div id="map" class="w-full h-96 rounded-md shadow-sm"></div>
                </div>

                <!-- Transactions Section -->
                <div class="w-full md:w-1/3 lg:w-2/5 bg-white rounded-md shadow-sm p-4">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Recent Transactions</h3>
                    <div class="overflow-y-auto max-h-[380px]">
                        <table class="w-full border border-gray-200 rounded-md shadow-md overflow-hidden">
                            <thead>
                            <tr class=" rounded-sm bg-gray-100 dark:bg-meta-4 ">
                                <th class="border-b border-gray-300 px-4 py-3 text-left">Transaction</th>
                                <th class="border-b border-gray-300 px-4 py-3 text-right">Amount</th>
                                <th class="border-b border-gray-300 px-4 py-3 text-center">Date</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                            <!-- Example Rows (Replace with Dynamic Data) -->
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-3 text-gray-700">Spotify</td>
                                <td class="px-4 py-3 text-right text-green-600 font-medium">$2,500</td>
                                <td class="px-4 py-3 text-center text-gray-500">Wed 3:00pm</td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-3 text-gray-700">Invision</td>
                                <td class="px-4 py-3 text-right text-green-600 font-medium">$5,000</td>
                                <td class="px-4 py-3 text-center text-gray-500">Wed 1:00pm</td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-3 text-gray-700">Jira</td>
                                <td class="px-4 py-3 text-right text-green-600 font-medium">$3,400</td>
                                <td class="px-4 py-3 text-center text-gray-500">Mon 7:40pm</td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-3 text-gray-700">Slack</td>
                                <td class="px-4 py-3 text-right text-green-600 font-medium">$1,000</td>
                                <td class="px-4 py-3 text-center text-gray-500">Wed 5:00pm</td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-3 text-gray-700">Dropbox</td>
                                <td class="px-4 py-3 text-right text-green-600 font-medium">$4,200</td>
                                <td class="px-4 py-3 text-center text-gray-500">Tue 2:20pm</td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-3 text-gray-700">Dropbox</td>
                                <td class="px-4 py-3 text-right text-green-600 font-medium">$4,200</td>
                                <td class="px-4 py-3 text-center text-gray-500">Tue 2:20pm</td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-3 text-gray-700">Dropbox</td>
                                <td class="px-4 py-3 text-right text-green-600 font-medium">$4,200</td>
                                <td class="px-4 py-3 text-center text-gray-500">Tue 2:20pm</td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-3 text-gray-700">Dropbox</td>
                                <td class="px-4 py-3 text-right text-green-600 font-medium">$4,200</td>
                                <td class="px-4 py-3 text-center text-gray-500">Tue 2:20pm</td>
                            </tr>
                            <!-- Add more rows as needed -->
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
