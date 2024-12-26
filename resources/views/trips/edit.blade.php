<x-app-layout>
    @auth
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center mt-1 w-full space-y-4 md:space-y-0">
                <h1 class="text-3xl font-bold p-6 text-white">{{ __('messages.Edit Trip') }}</h1>
                <div class="flex gap-2 md:flex-row  md:space-y-0 md:space-x-2 mt-4 md:mt-0 mr-4">
                    <a href="{{ route('trips.index') }}"
                class="w-28 px-4 py-1 text-sm rounded-md transition duration-200 
                       {{ request()->routeIs('trips.index') ? 'bg-white text-[#033f63]' : 'bg-white text-[#033f63]' }}
                       hover:bg-orange-400 hover:text-white font-semibold text-center">
                {{ __('messages.Passenger') }}
             </a>
             <a href="{{ route('trips.create') }}"
             class="w-28 px-4 py-1 text-sm rounded-md transition duration-200 
                    {{ request()->routeIs('trips.create') ? 'bg-[#033f63] text-white' : 'bg-[#033f63] text-white ' }}
                    hover:bg-white hover:text-[#033f63] text-center font-semibold">
             {{ __('messages.Driver') }}
          </a>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center p-6">
            <div
                class="hover:shadow-2xl w-full max-w-lg ride-card bg-white p-6 rounded-lg transition-shadow duration-500 shadow-md flex flex-col justify-between">
                <h1 class="text-3xl font-bold text-gray-800 mb-4 text-center">{{ __('messages.Modify Your Adventure') }}</h1>
                <form id="edit-trip-form" action="{{ route('trips.update', $trip->id) }}" method="POST"
                      class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="flex justify-between items-center space-x-2">
                        <div class="w-full md:w-1/2">
                            <label for="origin_city_id" class="block text-gray-700">{{ __('messages.From:') }}</label>
                            <select name="origin_city_id" id="origin-city" required
                                    class="w-full border border-gray-300 p-2 rounded bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                                <option value="" class="text-gray-500">{{ __('messages.Select origin city') }}</option>
                                @foreach ($cities as $city)
                                    <option
                                        value="{{ $city->id }}" {{ $trip->origin_city_id == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex justify-center items-center mt-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30px" viewBox="0 -5 24 24"
                                 id="meteor-icon-kit__regular-long-arrow-right" fill="none">
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M20.5858 8H1C0.447715 8 0 7.5523 0 7C0 6.4477 0.447715 6 1 6H20.5858L16.2929 1.70711C15.9024 1.31658 15.9024 0.68342 16.2929 0.29289C16.6834 -0.09763 17.3166 -0.09763 17.7071 0.29289L23.7071 6.2929C24.0976 6.6834 24.0976 7.3166 23.7071 7.7071L17.7071 13.7071C17.3166 14.0976 16.6834 14.0976 16.2929 13.7071C15.9024 13.3166 15.9024 12.6834 16.2929 12.2929L20.5858 8z"
                                    fill="#758CA3"/>
                            </svg>
                        </div>
                        <div class="w-full md:w-1/2">
                            <label for="destination_city_id" class="block text-gray-700">{{ __('messages.To:') }}</label>
                            <select name="destination_city_id" id="destination-city" required
                                    class="w-full border border-gray-300 p-2 rounded bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                                <option value="" class="text-gray-500">{{ __('messages.Select destination city') }}</option>
                                @foreach ($cities as $city)
                                    <option
                                        value="{{ $city->id }}" {{ $trip->destination_city_id == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-2">
                        <div class="flex flex-col w-full relative">
                            <label for="departure_time" class="block text-gray-700">{{ __('messages.Departure Time:') }}</label>
                            <div class="flex flex-col w-full relative">
                                <input type="text" id="date-picker" name="departure_time"
                                       class="border border-gray-300 rounded-md px-3 py-2  bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                                       placeholder="{{ __('messages.Departure Time:') }}"
                                       value="{{ $trip->departure_time->format('d.m.Y H:i ') }}" required>
                                <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-2.5" width="20px"
                                     height="20px" viewBox="0 0 24 24" fill="none">
                                    <rect x="3" y="6" width="18" height="15" rx="2" stroke="#33363F" stroke-width="2"/>
                                    <path
                                        d="M3 10C3 8.11438 3 7.17157 3.58579 6.58579C4.17157 6 5.11438 6 7 6H17C18.8856 6 19.8284 6 20.4142 6.58579C21 7.17157 21 8.11438 21 10H3Z"
                                        fill="#33363F"/>
                                    <path d="M7 3L7 6" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M17 3L17 6" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                    <rect x="7" y="12" width="4" height="2" rx="0.5" fill="#33363F"/>
                                    <rect x="7" y="16" width="4" height="2" rx="0.5" fill="#33363F"/>
                                    <rect x="13" y="12" width="4" height="2" rx="0.5" fill="#33363F"/>
                                    <rect x="13" y="16" width="4" height="2" rx="0.5" fill="#33363F"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex flex-col w-full relative">
                            <label for="departure_time" class="block text-gray-700">{{ __('messages.Arrival Time:') }}</label>
                            <div class="flex flex-col w-full relative">
                                <input type="text" id="date-picker" name="arrival_time"
                                       class="border border-gray-300 rounded-md px-3 py-2  bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                                       placeholder="{{ __('messages.Arrival Time:') }}"
                                       value="{{ $trip->arrival_time->format('d.m.Y H:i ') }}" required>
                                <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-2.5" width="20px"
                                     height="20px" viewBox="0 0 24 24" fill="none">
                                    <rect x="3" y="6" width="18" height="15" rx="2" stroke="#33363F" stroke-width="2"/>
                                    <path
                                        d="M3 10C3 8.11438 3 7.17157 3.58579 6.58579C4.17157 6 5.11438 6 7 6H17C18.8856 6 19.8284 6 20.4142 6.58579C21 7.17157 21 8.11438 21 10H3Z"
                                        fill="#33363F"/>
                                    <path d="M7 3L7 6" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M17 3L17 6" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                    <rect x="7" y="12" width="4" height="2" rx="0.5" fill="#33363F"/>
                                    <rect x="7" y="16" width="4" height="2" rx="0.5" fill="#33363F"/>
                                    <rect x="13" y="12" width="4" height="2" rx="0.5" fill="#33363F"/>
                                    <rect x="13" y="16" width="4" height="2" rx="0.5" fill="#33363F"/>
                                </svg>
                            </div>
                        </div>

                    </div>
                    <div class="flex justify-between space-x-2">
                        <div class="relative w-1/2">
                            <input type="number" id="available_seats" name="available_seats"
                                   class="border border-gray-300 rounded-md px-2 py-2 bg-white shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                                   min="1" placeholder="{{ __('messages.Available Seats:') }}"
                                   value="{{ old('available_seats', $trip->available_seats) }}" required>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24"
                                 fill="none" class="absolute right-2 top-2">
                                <path opacity="0.4"
                                      d="M17.9981 7.16C17.9381 7.15 17.8681 7.15 17.8081 7.16C16.4281 7.11 15.3281 5.98 15.3281 4.58C15.3281 3.15 16.4781 2 17.9081 2C19.3381 2 20.4881 3.16 20.4881 4.58C20.4781 5.98 19.3781 7.11 17.9981 7.16Z"
                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path opacity="0.4"
                                      d="M16.9675 14.4402C18.3375 14.6702 19.8475 14.4302 20.9075 13.7202C22.3175 12.7802 22.3175 11.2402 20.9075 10.3002C19.8375 9.59016 18.3075 9.35016 16.9375 9.59016"
                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path opacity="0.4"
                                      d="M5.96656 7.16C6.02656 7.15 6.09656 7.15 6.15656 7.16C7.53656 7.11 8.63656 5.98 8.63656 4.58C8.63656 3.15 7.48656 2 6.05656 2C4.62656 2 3.47656 3.16 3.47656 4.58C3.48656 5.98 4.58656 7.11 5.96656 7.16Z"
                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path opacity="0.4"
                                      d="M6.9975 14.4402C5.6275 14.6702 4.1175 14.4302 3.0575 13.7202C1.6475 12.7802 1.6475 11.2402 3.0575 10.3002C4.1275 9.59016 5.6575 9.35016 7.0275 9.59016"
                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path
                                    d="M12.0001 14.6302C11.9401 14.6202 11.8701 14.6202 11.8101 14.6302C10.4301 14.5802 9.33008 13.4502 9.33008 12.0502C9.33008 10.6202 10.4801 9.47021 11.9101 9.47021C13.3401 9.47021 14.4901 10.6302 14.4901 12.0502C14.4801 13.4502 13.3801 14.5902 12.0001 14.6302Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M9.0907 17.7804C7.6807 18.7204 7.6807 20.2603 9.0907 21.2003C10.6907 22.2703 13.3107 22.2703 14.9107 21.2003C16.3207 20.2603 16.3207 18.7204 14.9107 17.7804C13.3207 16.7204 10.6907 16.7204 9.0907 17.7804Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="relative w-1/2">
                            <input type="text" id="price" name="price"
                                   class="border border-gray-300 rounded-md px-2 py-2 bg-white shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                                   placeholder="{{ __('messages.Price:') }}" value="{{ old('price', $trip->price) }}" required>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24"
                                 fill="none" class="absolute right-2 top-2">
                                <circle opacity="0.5" cx="12" cy="12" r="10" stroke="#1C274C" stroke-width="1.5"/>
                                <path
                                    d="M15 6.80269C14.1175 6.29218 13.0929 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18C13.0929 18 14.1175 17.7078 15 17.1973"
                                    stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M5 10.5H10" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M5 13.5H10" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                    <textarea type="text" id="driver_comments" name="driver_comments"
                               class="border border-gray-300 rounded-md px-2 py-1 bg-white shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                               placeholder="{{ __('messages.Add any comments or instructions about the trip to help your passenger.') }}" >{{ old('driver_comments', $trip->driver_comments) }}</textarea>
                </div>
                @if( Auth::user()->gender == 'female')
                <div class="flex flex-col w-full">
                    <legend class=" mb-2">{{ __('messages.Passengers') }}</legend>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="passenger_gender_preference" value="female" class="radio"
                        {{ old('passenger_gender_preference', $trip->passenger_gender_preference) == 'female' ? 'checked' : '' }}/>
                        <span>{{ __('messages.Female Only') }}</span>
                    </label>
                    <label class="flex items-center space-x-2 mt-2">
                        <input type="radio" name="passenger_gender_preference" value="all" class="radio"
                        {{ old('passenger_gender_preference', $trip->passenger_gender_preference) == 'all' ? 'checked' : '' }} />
                        <span>{{ __('messages.All') }}</span>
                    </label>
                </div>
                @endif
                <p class="">{{ __('messages.Meeting At:') }}</p>
                    <div id="map" class="mb-1 h-[400px]" ></div>
                    <input type="hidden" id="latitude" name="latitude" />
                    <input type="hidden" id="longitude" name="longitude" />
                    <div class="flex flex-col items-center space-y-4">

                    </div>
                </form>
                <form id="delete-trip-form"
                      action="{{ route('trips.destroy', $trip->id) }}" method="POST"
                      class="flex flex-col items-center space-y-4 mt-3">
                    @csrf
                    @method('DELETE')

                </form>
                <div class="flex justify-center gap-x-4">
                <button type="submit"
                        form="edit-trip-form"
                        class="px-3 py-1 text-xs rounded-lg transition duration-200 bg-blue-500 text-white hover:bg-blue-600 w-[100px] h-[40px] max-w-full">
                    {{ __('messages.Update') }}
                </button>
                <button type="submit"
                        form="delete-trip-form"
                        class="px-3 py-1 text-xs rounded-lg transition duration-200 bg-red-500 text-white hover:bg-red-600 w-[100px] h-[40px] max-w-full">
                    {{ __('messages.Delete') }}
                </button>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var latitude = {{ $trip->latitude }};
                var longitude = {{ $trip->longitude }};

                var map = L.map('map').setView([latitude, longitude], 13);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    minZoom: 8,
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                var customIcon = L.icon({
                    iconUrl: '{{ asset('storage/icons/icon.png') }}',
                    iconSize: [25, 36],
                    iconAnchor: [12, 36],
                    popupAnchor: [0, -36] 
                });

                var marker = L.marker([latitude, longitude], {
                    draggable: true,
                    icon: customIcon
                }).addTo(map)
                .bindPopup("Drag me to update location")
                .openPopup();

                marker.on('dragend', function (e) {
                    var { lat, lng } = e.target.getLatLng();
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lng;
                });

                map.on('click', function (e) {
                    var { lat, lng } = e.latlng;
                    marker.setLatLng([lat, lng]);
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lng;
                });

                document.getElementById('latitude').value = latitude;
                document.getElementById('longitude').value = longitude;
            });
        </script>
    @endauth
</x-app-layout>
