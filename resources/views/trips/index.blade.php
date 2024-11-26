<x-app-layout>
    @auth
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 mt-1 w-full space-y-4 md:space-y-0">
        <h1 class="text-3xl font-bold text-black p-6">Available Rides</h1>
            <div class="flex gap-2 md:flex-row md:mr-[20px] md:space-y-0 md:space-x-2 mt-4 md:mt-0">
                <a href="{{ route('trips.index') }}"
                   class="w-28 px-4 py-1 text-sm rounded-md transition duration-200
                          {{ request()->routeIs('trips.index') ? 'bg-blue-100 text-blue-600' : 'bg-blue-200 text-gray-500' }}
                          hover:bg-blue-300 text-center">
                    Passenger
                </a>
                @if(!auth()->user()->email_verified_at && !auth()->user()->google_id)

                @else
                    <a href="{{ route('trips.create') }}"
                       class="w-28 px-4 py-1 text-sm rounded-md transition duration-200
                          {{ request()->routeIs('trips.create') ? 'bg-blue-100 text-blue-600' : 'bg-gray-200 text-gray-700' }}
                          hover:bg-gray-400 text-center">
                        Driver
                    </a>
                @endif
            </div>
        </div>
<form action="{{ route('trips.index') }}" method="GET" class="mb-4 flex flex-col items-center w-full max-w-lg mx-auto px-4">
    <div class="flex flex-col md:flex-row md:items-center justify-center mb-6 w-full">
        <div class="w-full md:w-1/4 mb-2 md:mb-0 md:mr-2">
            <select name="origin_city_id" id="origin-city"
                    class="border border-gray-300 rounded-md px-3 py-1.5 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                <option value="" class="text-gray-500">From:</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ request('origin_city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex items-center justify-center mb-2 md:mb-0">
            <button type="button" class="swap-button p-1 mr-1" id="swap-cities">
                <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="20px" viewBox="0 0 24 24" fill="none">
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M16 3.93a.75.75 0 0 1 1.177-.617l4.432 3.069a.75.75 0 0 1 0 1.233l-4.432 3.069A.75.75 0 0 1 16 10.067V8H4a1 1 0 0 1 0-2h12V3.93zm-9.177 9.383A.75.75 0 0 1 8 13.93V16h12a1 1 0 1 1 0 2H8v2.067a.75.75 0 0 1-1.177.617l-4.432-3.069a.75.75 0 0 1 0-1.233l4.432-3.069z"
                        fill="#000000"
                    />
                </svg>
            </button>
        </div>
        <div class="w-full md:w-1/4 mb-2 md:mb-0">
            <select name="destination_city_id" id="destination-city"
                    class="border border-gray-300 rounded-md px-3 py-1.5 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                <option value="" class="text-gray-500">To:</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ request('destination_city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
        <div class="mb-4 w-2/3 flex justify-center">
            <input type="text" id="filter-date" name="date"
                class="border border-gray-300 rounded-md px-3 py-1.5 w-full md:w-1/2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 text-center"
                placeholder="Select a date" readonly
                value="{{ request('date') }}">
            </div>
    <div class="flex items-center space-x-2">
        <button type="submit"
                class="px-4 py-1 text-sm rounded-full transition duration-200
                       {{ request()->routeIs('trips.index') ? 'bg-blue-100 text-blue-600' : 'bg-blue-500 text-white' }}
                       hover:bg-blue-300 w-full max-w-[100px]">
            Filter
        </button>
        <a href="{{ route('trips.index') }}"
           class="px-4 py-1 text-sm rounded-full transition duration-200
                  {{ request()->routeIs('trips.index') ? 'bg-gray-100 text-gray-600' : 'bg-gray-300 text-gray-700' }}
                  hover:bg-gray-400 w-full max-w-[100px] text-center">
            Reset
        </a>
    </div>
</form>
<div id="rides-list" class="grid grid-cols-1 mb-4 gap-6 sm:grid-cols-2 lg:grid-cols-3 hover px-4">
    @foreach ($trips as $trip)
    <div class="ride-card bg-white p-6 rounded-lg transition-transform duration-300 transform hover:scale-105 shadow-md flex flex-col justify-between" data-departure="{{ $trip->departure_time }}">
        <div class="mb-4 flex justify-between items-start">
                <div class="flex items-start">
                    @if($trip->users->image)
                        <img src="{{ asset('storage/' . $trip->users->image) }}" alt="{{ $trip->users->name }}" class="w-12 h-12 rounded-full mb-2">
                    @else
                        <img class="relative inline-block h-12 w-12  object-cover object-center rounded-full" src="{{ asset('https://eu.ui-avatars.com/api/' . $trip->users->name  . '+' . $trip->users->lastname) }}" alt="Default Image">
                    @endif
                    <div class="ml-2">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $trip->users->name ?? 'N/A' }} {{ $trip->users->lastname ?? '' }}
                            @if($trip->users->is_verified)
                                <span class="text-blue-500 ml-1">✔</span>
                            @endif
                        </h3>
                    </div>
                </div>
                @if ($trip->driver_id === auth()->id())
                        <a href="{{ route('trips.edit', $trip->id) }}" class="text-indigo-600 text-lg hover:text-indigo-800 font-semibold">Edit</a>
                    @else
                        <a href="{{ route('trips.show', $trip->id) }}" class="text-indigo-600 text-lg hover:text-indigo-800 font-semibold">Book Now</a>
                    @endif
            </div>
            <div class="mb-2 flex items-center">
                <p class="text-blue-900 flex items-center mr-4 text-lg">
                    <strong>{{ $trip->origincity->name }} </strong>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20px" viewBox="0 -5 24 24" id="meteor-icon-kit__regular-long-arrow-right" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5858 8H1C0.447715 8 0 7.5523 0 7C0 6.4477 0.447715 6 1 6H20.5858L16.2929 1.70711C15.9024 1.31658 15.9024 0.68342 16.2929 0.29289C16.6834 -0.09763 17.3166 -0.09763 17.7071 0.29289L23.7071 6.2929C24.0976 6.6834 24.0976 7.3166 23.7071 7.7071L17.7071 13.7071C17.3166 14.0976 16.6834 14.0976 16.2929 13.7071C15.9024 13.3166 15.9024 12.6834 16.2929 12.2929L20.5858 8z" fill="#758CA3"/>
                        </svg>
                    <strong> {{ $trip->destinationcity->name }}</strong>
                </p>
            </div>
            <div class="flex justify-between items-center text-gray-700">
                <p class="flex-1 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mb-1" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                        <rect x="3" y="6" width="18" height="15" rx="2" stroke="#33363F" stroke-width="2"/>
                        <path d="M3 10C3 8.11438 3 7.17157 3.58579 6.58579C4.17157 6 5.11438 6 7 6H17C18.8856 6 19.8284 6 20.4142 6.58579C21 7.17157 21 8.11438 21 10H3Z" fill="#33363F"/>
                        <path d="M7 3L7 6" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                        <path d="M17 3L17 6" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                        <rect x="7" y="12" width="4" height="2" rx="0.5" fill="#33363F"/>
                        <rect x="7" y="16" width="4" height="2" rx="0.5" fill="#33363F"/>
                        <rect x="13" y="12" width="4" height="2" rx="0.5" fill="#33363F"/>
                        <rect x="13" y="16" width="4" height="2" rx="0.5" fill="#33363F"/>
                    </svg>
                    <strong style="font-size: 1.1em;">{{ \Carbon\Carbon::parse($trip->departure_time)->format('d.m') }}</strong>&nbsp;&nbsp;&nbsp;

                    <svg xmlns="http://www.w3.org/2000/svg" class="mb-0.5" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                        <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 6V12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.24 16.24L12 12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <strong style="font-size: 1.1em;">{{ \Carbon\Carbon::parse($trip->departure_time)->format('H:i') }}</strong>
                </p>
                <div class="flex items-center ml-4 mb-2">
                    <strong class="mr-1">{{ $trip->available_seats }}</strong>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.4" d="M17.9981 7.16C17.9381 7.15 17.8681 7.15 17.8081 7.16C16.4281 7.11 15.3281 5.98 15.3281 4.58C15.3281 3.15 16.4781 2 17.9081 2C19.3381 2 20.4881 3.16 20.4881 4.58C20.4781 5.98 19.3781 7.11 17.9981 7.16Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path opacity="0.4" d="M16.9675 14.4402C18.3375 14.6702 19.8475 14.4302 20.9075 13.7202C22.3175 12.7802 22.3175 11.2402 20.9075 10.3002C19.8375 9.59016 18.3075 9.35016 16.9375 9.59016" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path opacity="0.4" d="M5.96656 7.16C6.02656 7.15 6.09656 7.15 6.15656 7.16C7.53656 7.11 8.63656 5.98 8.63656 4.58C8.63656 3.15 7.48656 2 6.05656 2C4.62656 2 3.47656 3.16 3.47656 4.58C3.48656 5.98 4.58656 7.11 5.96656 7.16Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path opacity="0.4" d="M6.9975 14.4402C5.6275 14.6702 4.1175 14.4302 3.0575 13.7202C1.6475 12.7802 1.6475 11.2402 3.0575 10.3002C4.1275 9.59016 5.6575 9.35016 7.0275 9.59016" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.0001 14.6302C11.9401 14.6202 11.8701 14.6202 11.8101 14.6302C10.4301 14.5802 9.33008 13.4502 9.33008 12.0502C9.33008 10.6202 10.4801 9.47021 11.9101 9.47021C13.3401 9.47021 14.4901 10.6302 14.4901 12.0502C14.4801 13.4502 13.3801 14.5902 12.0001 14.6302Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.0907 17.7804C7.6807 18.7204 7.6807 20.2603 9.0907 21.2003C10.6907 22.2703 13.3107 22.2703 14.9107 21.2003C16.3207 20.2603 16.3207 18.7204 14.9107 17.7804C13.3207 16.7204 10.6907 16.7204 9.0907 17.7804Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <strong class="ml-2 mr-1">{{ $trip->price }}</strong>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                        <circle opacity="0.5" cx="12" cy="12" r="10" stroke="#1C274C" stroke-width="1.5"/>
                        <path d="M15 6.80269C14.1175 6.29218 13.0929 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18C13.0929 18 14.1175 17.7078 15 17.1973" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M5 10.5H10" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M5 13.5H10" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                    @if ($trip->passenger_gender_preference == 'female')
                        <img
                            src="{{ asset('storage/icons/female.svg') }}"
                            alt="Female Only"
                            title="Female Only"
                            class="relative inline-block h-auto w-10 p-2"
                        />
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
        <div id="no-rides" class="hidden text-center mt-6 text-gray-500">
            <p>No available rides for the selected date.</p>
        </div>
    </div>
    @endauth
</x-app-layout>
