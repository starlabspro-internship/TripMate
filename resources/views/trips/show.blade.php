<x-app-layout>
    <form action="{{ route('booking.store') }}" method="POST"  class="bg-gray-200 my-20 m-5 rounded-2xl p-20 md:mt-20 md:mb-5 md:mx-40 lg:mt-20 lg:mb-5 lg:mx-40">
        @csrf
        <input type="hidden" name="trip_id" value="{{ $trip->id }}">
        <input type="hidden" name="passenger_id" value="{{ auth()->user()->id }}">
                <a href="/trips">
                    <img
                        src="{{ asset('storage/icons/backk.svg') }}"
                        alt="avatar"
                        class="relative pb-5 inline-block h-10 w-10 !rounded-full object-cover object-center"
                    />
                </a>
        <div>
            <img class="max-w-xl  ml-5 float-end hidden lg:block rounded-2xl" src="{{ Vite::asset('resources/images/Vushtrri.jpg') }}" alt="..">
            <div class="flex text-black text-xl capitalize space-x-6 justify-between mt-4">
                <div class="flex items-center space-x-2">
                    <p>{{$trip->origincity->name}}</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20px" viewBox="0 -5 24 24" id="meteor-icon-kit__regular-long-arrow-right" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5858 8H1C0.447715 8 0 7.5523 0 7C0 6.4477 0.447715 6 1 6H20.5858L16.2929 1.70711C15.9024 1.31658 15.9024 0.68342 16.2929 0.29289C16.6834 -0.09763 17.3166 -0.09763 17.7071 0.29289L23.7071 6.2929C24.0976 6.6834 24.0976 7.3166 23.7071 7.7071L17.7071 13.7071C17.3166 14.0976 16.6834 14.0976 16.2929 13.7071C15.9024 13.3166 15.9024 12.6834 16.2929 12.2929L20.5858 8z" fill="#758CA3"/>
                    </svg>
                    <p>{{$trip->destinationcity->name}}</p>
                </div>
            </div>
                <div class="flex-col mt-5 space-y-5 pb-5">
                    <img
                        src="{{ asset('storage/icons/time.svg') }}"
                        alt="avatar"
                        class="relative inline-block h-8 w-8 !rounded-full object-cover object-center"
                    />
                    <p class="relative inline-block  object-cover object-center">{{$trip->departure_time}}</p>
                <div class="flex-col mt-5 pb-4">
                    <img
                        src="{{ asset('storage/icons/eu.svg') }}"
                        alt="avatar"
                        class="relative inline-block h-5 w-5 !rounded-full object-cover object-center"
                    />
                    <p class="relative inline-block  object-cover object-center">{{$trip->price}}</p>
                </div>
                <div class="text-black  space-y-1 justify-between mt-4">    
                    <h1 class="text-lg">Driver:</h1>
                    @if ($trip->users->image)
                        <img
                            src="{{ asset('storage/' . $trip->users->image) }}" alt="{{ $trip->users->name }}"
                            class="rounded-full relative inline-block h-12 w-12 object-cover object-center"
                        />
                    @else
                        <img class="relative inline-block h-12 w-12  object-cover object-center" src="{{ asset('https://eu.ui-avatars.com/api/' . $trip->users->name  . '+' . $trip->users->lastname) }}" alt="Default Image">
                    @endif
                    <p class="relative inline-block px-2 object-cover object-center">{{$trip->users->name}}</p>
                </div>
                <div class="flex-col mt-5 space-t-5 ">
                    <h1 class="text-lg">Seats:</h1>
                    <p class="relative inline-block  object-cover object-center" > {{$available_seats}} free seats</p>
                    
                </div>
                @if ($available_seats > 0)
                <div class="flex-col  pb-6">
                    <h1 class="text-lg py-3">Choose the number of seats:</h1>
                    <input class=" px-3 py-1 border border-gray-700 rounded-lg bg-gray-200 shadow-sm focus:outline-none focus:ring-2 focus:border-transparent text-gray-700"
                     type="number" name="seats_booked" min="1" max="{{ $available_seats }}" required>
                </div>
                @else
                <p class="text-red-500">There are no seats available for this trip.</p>
                @endif
             @if ($available_seats>0)
            <div>
                <button class="w-full rounded-md bg-blue-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2 md:w-40"
                 type="submit">
                    Book
                  </button>
            </div>
            @else

            @endif
        </div>
    </form>
</x-app-layout>
