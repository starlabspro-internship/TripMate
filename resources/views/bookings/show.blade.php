<x-app-layout>
    <div>
        <form action="{{ route('booking.store') }}" method="POST"  class="bg-gray-200 my-20 m-5 rounded-2xl p-20 md:mt-20 md:mb-5 md:mx-40 lg:mt-20 lg:mb-5 lg:mx-40">
            @csrf
            <input type="hidden" name="trip_id" value="{{ $trip->id }}">
            <input type="hidden" name="passenger_id" value="{{ auth()->user()->id }}">
            <a href="/trips">
                <img
                    
                    src="{{ Vite::asset('resources/images/backk.svg') }}"
                    alt="avatar"
                    class="relative pb-5 inline-block h-10 w-10 !rounded-full object-cover object-center">
                </img>
            </a>
            <div>
                <img class="max-w-lg  ml-5 float-end hidden lg:block rounded-2xl" src="{{ Vite::asset('resources/images/Vushtrri.jpg') }}" alt="..">
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
                            src="{{ Vite::asset('resources/images/time.svg') }}"
                            alt="avatar"
                            class="relative inline-block h-8 w-8 !rounded-full object-cover object-center"
                        />
                        <p class="relative inline-block  object-cover object-center">{{$trip->departure_time}}</p>
                    <div class="flex-col mt-5 pb-4">
                        <img
                            src="{{ Vite::asset('resources/images/eu.svg') }}"
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
                        <p class="relative inline-block  object-cover object-center">{{$trip->users->name}}</p>
                    </div>
                    @if (session('booking'))
                        <p class="text-green-500">You have successfully reserved {{ session('booking')->seats_booked }} seats</p>
                    @endif
            </div>
        </form>
        <div class="flex flex-col md:flex-row items-center mt-6 space-x-2">
            <a  
                class="w-full rounded-md my-2 bg-white py-2 px-4 border border-transparent text-center text-sm text-black transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-green-300 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none md:w-40">
                Chat
            </a>
                <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" class="flex items-center">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="rounded-md bg-red-600 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-red-400 active:shadow-none disabled:pointer-events-none disabled:opacity-50 md:w-40">
                        Delete Booking
                    </button>
                </form>
        </div>
        </ul>
    </div>
</x-app-layout>