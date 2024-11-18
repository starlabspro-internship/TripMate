<x-app-layout>
            <div class="container px-6 py-8 mx-auto">
                <h3 class="text-3xl font-medium text-gray-700">Dashboard</h3>

                <div class="mt-4">
                    <div class="flex flex-wrap -mx-6">
                        <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                            <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                                <div class="p-3 bg-blue-600 bg-opacity-75 rounded-full">
                                    <img
                                        src="{{ asset('storage/icons/users.svg') }}"
                                        alt="avatar"
                                        class="relative inline-block h-6 w-6  object-cover object-center"
                                    />
                                </div>

                                <div class="mx-5">
                                    <a href="{{ route('superadmin.index') }}">
                                        <h4 class="text-2xl font-semibold text-gray-700">{{$totalUsers}}</h4>
                                        <div class="text-gray-500">Total Users</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                            <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                                <div class="p-3 bg-blue-600 bg-opacity-75 rounded-full">
                                    <img
                                        src="{{ asset('storage/icons/road.svg') }}"
                                        alt="avatar"
                                        class="relative inline-block h-6 w-6  object-cover object-center"
                                    />
                                </div>

                                <div class="mx-5">
                                    <a href="{{ route('superadmin.index', ['tab' => 'trips']) }}">
                                        <h4 class="text-2xl font-semibold text-gray-700">{{$totalTrips}}</h4>
                                        <div class="text-gray-500">Total Trips</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                            <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                                <div class="p-3 bg-blue-600 bg-opacity-75 rounded-full">
                                    <img
                                        src="{{ asset('storage/icons/cars.svg') }}"
                                        alt="avatar"
                                        class="relative inline-block h-6 w-6  object-cover object-center"
                                    />
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
                </div>

                <div class="mt-8">

                </div>
            </div>
</x-app-layout>

