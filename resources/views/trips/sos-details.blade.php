<x-app-layout>

    <div class="max-w-3xl mx-auto my-4 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-red-600 text-center mb-4">
            <svg 
                    class="w-10 h-10 inline-block mb-2"
                    version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 332.778 332.778" xml:space="preserve" fill="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier"> <g id="XMLID_842_"> <path id="XMLID_845_" style="fill:#c22f0a;" d="M261.389,280.778v-96.364c0-52.25-42.75-95-95-95h0c-52.25,0-95,42.75-95,95v96.364 H261.389z"></path> <rect id="XMLID_52_" x="282.5" y="122.222" style="fill:#ffc400;" width="48.889" height="24.444"></rect> <rect id="XMLID_49_" x="1.389" y="122.222" style="fill:#ffc400;" width="48.889" height="24.444"></rect> <rect id="XMLID_46_" x="58.486" y="32.652" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 161.0799 47.4705)" style="fill:#ffc400;" width="24.444" height="48.889"></rect> <rect id="XMLID_43_" x="237.625" y="44.875" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 487.7542 -87.8408)" style="fill:#ffc400;" width="48.889" height="24.444"></rect> <path id="XMLID_853_" style="fill:#c22f0a;" d="M166.389,89.414L166.389,89.414l0,191.364h95v-96.364 C261.389,132.164,218.639,89.414,166.389,89.414z"></path> <rect id="XMLID_856_" x="166.389" y="0" style="fill:#ffc400;" width="12.222" height="48.889"></rect> <rect id="XMLID_34_" x="51.389" y="272.778" style="fill:#ffc400;" width="230" height="60"></rect> <rect id="XMLID_860_" x="166.389" y="272.778" style="fill:#ffc400;" width="115" height="60"></rect> </g> </g>
                </svg>
            {{__('messages.SOS Alert Details')}}
        </h1>
                    @if($trips)
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-800 text-start">{{__('messages.Driver Information')}}</h2>
                        <div class="flex justify-center">
                            <div class="w-full max-w-3xl py-5 bg-white rounded-md shadow-sm">
                                <div class="flex  items-center gap-2">
                                    @if($trips->users->image)
                                        <img src="{{ asset('storage/' . $trips->users->image) }}"
                                             alt="User Image"
                                             class="w-28 h-28 rounded-full object-cover border-2 border-gray-300">
                                    @else
                                        <img
                                            src="{{ asset('https://eu.ui-avatars.com/api/?name=' . urlencode($trips->users->name . ' ' .$trips->users->lastname) ) }}"
                                            alt="Default Image"
                                            class="w-28 h-28 rounded-full object-cover border-2 border-gray-300">
                                    @endif
                                    <div class="text-sm text-gray-700 mt-4">
                                        <p><span class="font-semibold text-lg">{{$trips->users->name}} {{$trips->users->lastname}}</span></p>
                                        <div class="flex justify-center gap-4 mx-auto">
                                            <div class="flex flex-col items-start gap-2">
                                                <p>{{__('messages.Age')}}: <span class="font-semibold">{{ \Carbon\Carbon::parse($trips->users->birthday)->age }} {{__('messages.years')}}</span></p>
                                                <p>{{__('messages.City')}}: <span class="font-semibold">{{$trips->users->city}}</span></p>
                                            </div>
                                            <div class="flex flex-col items-start gap-2">
                                                <p>{{__('messages.Gender')}}: <span class="font-semibold">{{ucfirst($trips->users->gender)}}</span></p>
                                                <p>{{__('messages.Phone')}}: <span class="font-semibold">{{$trips->users->phone}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
            <div class="mb-6">
                <h2 class="text-lg font-medium text-gray-800 flex justify-start">{{__('messages.Passengers Information')}}</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($trips->bookings as $booking)
                        <div class="w-full max-w-3xl p-3 bg-white rounded-md shadow-sm mb-3">
                            <div class="flex items-center gap-3">
                                @if($booking->passenger->image)
                                    <img src="{{ asset('storage/' . $booking->passenger->image) }}"
                                         alt="User Image"
                                         class="w-14 h-14 rounded-full object-cover border-2 border-gray-300">
                                @else
                                    <img
                                        src="{{ asset('https://eu.ui-avatars.com/api/?name=' . urlencode($booking->passenger->name  . ' ' .$booking->passenger->lastname) ) }}"
                                        alt="Default Image"
                                        class="w-14 h-14 rounded-full object-cover border-2 border-gray-300">
                                @endif
                                <div class="text-sm text-gray-700">
                                    <p><span class="font-semibold text-lg">{{$booking->passenger->name }} {{$booking->passenger->lastname}}</span></p>
                                    <div class="flex flex-col sm:flex-row sm:space-x-6 mb-2 gap-2">
                                        <div class="flex flex-col items-start gap-2">
                                        <p>{{__('messages.Age')}}: <span class="font-semibold">{{ \Carbon\Carbon::parse($booking->passenger->birthday)->age }} {{__('messages.years')}}</span></p>
                                        <p>{{__('messages.City')}}: <span class="font-semibold">{{$booking->passenger->city}}</span></p>
                                        </div>
                                        <div class="flex flex-col items-start gap-2">
                                        <p>{{__('messages.Gender')}}: <span class="font-semibold">{{ucfirst($booking->passenger->gender)}}</span></p>
                                        <p>{{__('messages.Phone')}}: <span class="font-semibold">{{$booking->passenger->phone}}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>
        @endif
        <div class="mb-4">
            @if($sosAlert)
                        @if ($sosAlert->status == 'pending')
                            <h2 class="text-lg font-medium text-gray-800">
                                {{__('messages.Emergency Status')}}: <span class="text-sm text-red-600 bg-red-100 px-2 py-1 rounded-md"> {{ ucfirst(__('messages.' . $sosAlert->status)) }} </span>
                            </h2>
                        @elseif ($sosAlert->status == 'resolved')
                            <h2 class="text-lg font-medium text-gray-800">
                                {{__('messages.Emergency Status')}}: <span class="text-sm text-green-800 bg-green-100 px-2 py-1 rounded-md"> {{ ucfirst(__('messages.' . $sosAlert->status)) }} </span>
                            </h2>
                        @endif
            @endif
        </div>


        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-700">{{__('messages.Trip Location')}}</h2>
            <div id="map" style="height: 400px;"></div>
        </div>
    <form id="resolve-form" class="hidden" action="{{route('sosAlert.resolve', $sosAlert)}}" method="POST">
        @csrf
    </form>
    @if ($sosAlert->status=='pending')
    <div class="mt-6 text-center flex justify-center gap-x-4">
        <button type="submit"
                form="resolve-form"
                class="px-3 py-1 text-sm rounded-lg transition duration-200 bg-red-500 text-white hover:bg-red-600 w-[100px] h-[40px] max-w-full">
            {{ __('messages.Resolve') }}
        </button>


</div>
    @endif
        
    </div>
        <!-- Include the Google Maps API -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEdH7T1w4bSSonfVusoo8JlJJFK9kav9o&callback=initMap" async defer></script>
        <script>
            let map, marker;
    
            function initMap() {
                const tripLocation = {
                    lat: {{ $sosAlert->latitude }},
                    lng: {{ $sosAlert->longitude }}
                };
    
                map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 14,
                    center: tripLocation,
                    minZoom: 8,
                });
    
                marker = new google.maps.Marker({
                    position: tripLocation,
                    map: map,
                });
            }
    
    
            function trackUserLocation() {
                if (navigator.geolocation) {
                    setInterval(() => {
                        navigator.geolocation.getCurrentPosition(
                            (position) => {
                                const latitude = position.coords.latitude;
                                const longitude = position.coords.longitude;
                                const newLocation = { lat: latitude, lng: longitude };
    
                                console.log('Updating location: lat:', latitude, 'lng:', longitude);
    
                                axios.post('/update-location', {
                                    user_id: {{ $sosAlert->user_id }}, 
                                    trip_id: {{ $sosAlert->trip_id }},
                                    latitude: latitude,
                                    longitude: longitude
                                })
                                    .then(response => {
                                        console.log('Location updated successfully!');
                                    })
                                    .catch(error => {
                                        console.error('Error updating location:', error);
                                    });
    
                                marker.setPosition(newLocation);
                                map.setCenter(newLocation);
                            },
                            (error) => {
                                console.error('Error retrieving location:', error);
                            },
                            {
                                enableHighAccuracy: true,
                                timeout: 10000,
                                maximumAge: 0,
                            }
                        );
                    }, 60000); 
                } else {
                    console.error('Geolocation is not supported by this browser.');
                }
            }
    
            function listenForLiveUpdates() {
                const tripId = {{ $sosAlert->trip_id }}; 
                console.log('Checking if Echo is initialized...');
                if (window.Echo) {
                    console.log('Echo is initialized. Listening to channel:', `trip.${tripId}`);
                    window.Echo.channel(`trip.${tripId}`)
                        .listen('.location.live', (data) => {
                            if (data.user_id === {{ $sosAlert->user_id }}) { 
                                const newLocation = {
                                    lat: data.latitude,
                                    lng: data.longitude
                                };
    
                                marker.setPosition(newLocation);
    
                                map.setCenter(newLocation);
                            }
                        });
                } else {
                    console.error('Echo is not initialized!');
                }
            }
    
            document.addEventListener('DOMContentLoaded', () => {
                initMap();
                trackUserLocation();
                listenForLiveUpdates();
            });
        </script>
    
    
    
    
    
    </x-app-layout>
    