<x-app-layout>
<div>
    <form action="{{ route('booking.store', ['id' => $trip->id]) }}" method="POST"  class="bg-gray-200 my-20 m-3 rounded-lg  p-20 lg:my-20  md:my-40 md:mx-60">
        @csrf
        <input type="hidden" name="trip_id" value="{{ $trip->id }}">
        <input type="hidden" name="passenger_id" value="{{ auth()->user()->id }}">
        <a href="/trips">
            <img
                
                src="{{ Vite::asset('resources/images/bck.svg') }}"
                alt="avatar"
                class="relative pb-5 inline-block h-10 w-10 !rounded-full object-cover object-center">
            </img>
        </a>
        <div>
            <img class="max-w-md  ml-5 float-end hidden lg:block rounded-2xl" src="{{ Vite::asset('resources/images/Vushtrri.jpg') }}" alt="..">
                <div class="text-black text-xl capitalize space-y-1 justify-between mt-4">
                    <p>{{$trip->origincity->name}} 
                        <img
                            src="{{ Vite::asset('resources/images/nextt.svg') }}"
                            alt="avatar"
                            class="relative inline-block h-5 w-5 !rounded-full object-cover object-center"
                        />
                        {{$trip->destinationcity->name}}</p>
                </div>
                <div class="flex-col mt-5 space-y-5 pb-5">
                    <img
                        src="{{ Vite::asset('resources/images/time.svg') }}"
                        alt="avatar"
                        class="relative inline-block h-12 w-12 !rounded-full object-cover object-center"
                    />
                    <p class="relative inline-block  object-cover object-center">{{$trip->departure_time}}</p>
                <div class="flex-col mt-5 pb-4">
                    <img
                        src="{{ Vite::asset('resources/images/eu.svg') }}"
                        alt="avatar"
                        class="relative inline-block h-7 w-7 !rounded-full object-cover object-center"
                    />
                    <p class="relative inline-block  object-cover object-center">{{$trip->price}}</p>
                </div>
                <div class="text-black  space-y-1 justify-between mt-4">    
                    <h1 class="text-lg">Shoferi:</h1>
                    @if ($trip->users->image)
                        <img
                            src="{{ Vite::asset('storage/' . $trip->users->image) }}"
                            alt="Driver img"
                            class="relative inline-block h-12 w-12 object-cover object-center"
                        />
                    @else
                        <img class="relative inline-block h-12 w-12  object-cover object-center" src="{{ asset('https://eu.ui-avatars.com/api/' . $trip->users->name  . '+' . $trip->users->lastname) }}" alt="Default Image">
                    @endif
                    <p class="relative inline-block  object-cover object-center">{{$trip->users->name}}</p>
                </div>
                @if (session('booking'))
                    <p class="text-green-500">Ju keni rezervuar {{ session('booking')->seats_booked }} vende me sukses</p>
                @endif
        </div>
    </form>
    <div class="flex flex-col md:flex-row items-center mt-6 space-x-2">
        <a  
            class="w-full rounded-md my-2 bg-white py-2 px-4 border border-transparent text-center text-sm text-black transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-green-300 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none md:w-40">
            Chat
        </a>
        @foreach ($bookings as $booking)
            <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" class="flex items-center">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="rounded-md bg-red-600 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-red-400 active:shadow-none disabled:pointer-events-none disabled:opacity-50 md:w-40">
                    Delete Booking
                </button>
            </form>
        @endforeach
    </div>
    </ul>
</div>
</x-app-layout>