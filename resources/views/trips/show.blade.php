<x-app-layout>
    <div class="bg-image bg-no-repeat bg-cover bg-center min-h-screen p-[15px]"> 
        <div class="mt-1 p-1 md:mx-[80px] rounded-3xl ">
            <a href="/trips">
                            <img
                                src="{{ asset('storage/icons/back2.svg') }}"
                                alt="avatar"
                                class="relative inline-block h-7 w-7 !rounded-full object-cover object-center"
                            />
                            <span class="text-white">Back to rides</span>
                        </a>
            <form action="{{ route('bookings.store') }}" method="POST"  class="bg-white bg-opacity-80  m-4 rounded-3xl shadow-md">
                @csrf
                <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                <input type="hidden" name="passenger_id" value="{{ auth()->user()->id }}">
                    <div class="relative ">
                        <div id="map" class=" h-[300px] w-full rounded-t-3xl md:rounded-l-none md:h-[544px] md:w-1/2 md:float-end lg:block md:rounded-r-3xl opacity-80"></div>
                    </div>
                    <div class="p-10 ">
                        <div class="flex my-2 text-black text-xl capitalize space-x-6 justify-between">
                            <div class="flex items-center space-x-2">
                                <p>{{$trip->origincity->name}}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20px" viewBox="0 -5 24 24" id="meteor-icon-kit__regular-long-arrow-right" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5858 8H1C0.447715 8 0 7.5523 0 7C0 6.4477 0.447715 6 1 6H20.5858L16.2929 1.70711C15.9024 1.31658 15.9024 0.68342 16.2929 0.29289C16.6834 -0.09763 17.3166 -0.09763 17.7071 0.29289L23.7071 6.2929C24.0976 6.6834 24.0976 7.3166 23.7071 7.7071L17.7071 13.7071C17.3166 14.0976 16.6834 14.0976 16.2929 13.7071C15.9024 13.3166 15.9024 12.6834 16.2929 12.2929L20.5858 8z" fill="#758CA3"/>
                                </svg>
                                <p>{{$trip->destinationcity->name}}</p>
                            </div>
                        </div>
                            <div class="flex-col space-y-5 pb-5">
                                <img
                                    src="{{ asset('storage/icons/time.svg') }}"
                                    alt="avatar"
                                    class="relative inline-block h-7 w-7 !rounded-full object-cover object-center"
                                />
                                <p class="relative inline-block  object-cover object-center">{{$trip->departure_time->format('H:i - d M')}}</p>
                            </div>
                            <div class="flex flex-row  items-center self-center rounded-lg">
                                <img
                                    src="{{ asset('storage/icons/talk.svg') }}"
                                    alt="avatar"
                                    class="relative inline-block h-6 w-6 mx-1 object-cover object-center"
                                />
                                @if ($trip->driver_comments)
                                    <p class="relative inline-block px-1 object-cover object-center">{{$trip->driver_comments}}</p>
                                @else
                                    <p class="relative inline-block px-1  object-cover object-center">Talk in  chat</p>
                                @endif
                            </div>
                            <div class="flex-col pb-4 space-y-5">
                                &nbsp;<img
                                    src="{{ asset('storage/icons/eu.svg') }}"
                                    alt="avatar"
                                    class="relative inline-block h-4 w-4 !rounded-full object-cover object-center"
                                />
                                <p class="relative inline-block  object-cover object-center">&nbsp;&nbsp;{{$trip->price}}</p>
                            </div>
                            <div class="text-black  space-y-1 justify-between ">
                                <h1 class="text-lg">Driver:</h1>
                                @if ($trip->users->image)
                                    <img
                                        src="{{ asset('storage/' . $trip->users->image) }}" alt="{{ $trip->users->name }}"
                                        class="rounded-full relative inline-block h-10 w-10 object-cover object-center"
                                    />
                                @else
                                    <img class="relative rounded-full inline-block h-10 w-10  object-cover object-center" src="{{ asset('https://eu.ui-avatars.com/api/' . $trip->users->name  . '+' . $trip->users->lastname) }}" alt="Default Image">
                                @endif
                                <p class="relative inline-block px-2 object-cover object-center">{{$trip->users->name}}</p>
                            </div>
                            <div class="flex-col mt-1 space-t-5 ">
                                <h1 class="text-lg">Seats:</h1>
                                <p class="relative inline-block  object-cover object-center" > {{$available_seats}} free seats</p>

                            </div>
                            @if ($available_seats > 0)
                            <div class="flex-col  pb-6">
                                <h1 class="text-lg pt-3">Choose the number of seats:</h1>
                                <input class="  border border-gray-700 rounded-lg bg-gray-200 bg-opacity-25 shadow-sm focus:outline-none focus:ring-2 focus:border-transparent text-gray-700"
                                type="number" name="seats_booked" min="1" max="{{ $available_seats }}" value="1" required>
                            </div>
                            @else
                            <div class="flex-col  pb-6">
                                <p class="text-red-500 py-2">There are no seats available for this trip.</p>
                                <input class="  border border-gray-700 rounded-lg bg-gray-200 bg-opacity-25 shadow-sm focus:outline-none focus:ring-2 focus:border-transparent text-gray-700"
                                type="number" name="seats_booked" min="1" max="{{ $available_seats }}" value="0" required disabled>
                            </div>
                            @endif
                            @if ($available_seats>0)
                            <div>
                                <button class="rounded-md bg-blue-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none md:w-40"
                                type="submit">
                                    Book Now
                                </button>
                            </div>
                            @else
                            <div>
                                <button 
                                    class="rounded-md bg-red-500 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-red-700 focus:shadow-none active:bg-red-700 hover:bg-red-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:bg-red-500 md:w-40"
                                    type="submit"
                                    disabled>
                                    Book Now
                                </button>
                            </div>
                            @endif
                    </div>
            </form>
        </div>

        <form action="{{ route('bookings.reserve') }}" method="POST"  class="bg-gray-200  bg-opacity-80 rounded-2xl m-4  p-2  md:mb-5 md:mx-24  lg:mb-5 lg:mx-30">
            @csrf
            <input type="hidden" name="trip_id" value="{{ $trip->id }}">
            <input type="hidden" name="passenger_id" value="{{ auth()->user()->id }}">
            <div class="flex justify-between items-center space-x-4">
                <p class="w-4/5 text-sm md:text-md ">If you want to reserve your seat and pay in person, choose the "Reserve Your Seat" option. This allows you to secure your seat now and handle payment conveniently when you arrive.</p>
                @if ($available_seats > 0)
                <div class="flex items-center space-x-4 pb-2 pt-2">
                    <input
                        class="border border-gray-700 rounded-lg  bg-gray-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-800 text-gray-700 p-2"
                        type="number" name="seats_booked" min="1" max="{{ $available_seats }}" value="1" required
                        placeholder="Seats to book">
                    <button
                        class="whitespace-nowrap rounded-md bg-blue-800 py-2 px-6 text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700  disabled:pointer-events-none disabled:opacity-50"
                        type="submit">
                        Reserve Seat
                    </button>
                </div>
                @else
                <p class="text-red-500 py-4">There are no seats available for this trip.</p>
                @endif
            </div>

        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var latitude = {{ $trip->latitude }};
            var longitude = {{ $trip->longitude }};

            var map = L.map('map').setView([latitude, longitude], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                minZoom: 8,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([latitude, longitude]).addTo(map)
            .bindPopup(`
                    <div class="font-medium p-2 rounded-lg text-center">
                        <span class="italic text-indigo-500 text-sm">Meeting Location</span>
                    </div>
                `)
                .openPopup();
        });
    </script>
</x-app-layout>
