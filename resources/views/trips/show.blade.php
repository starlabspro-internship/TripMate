<x-app-layout>
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
                <div class="flex-col mt-5 space-t-5 pb-6">
                    <h1 class="text-lg">Uleset:</h1>
                    <p class="relative inline-block  object-cover object-center" > {{$available_seats}} vende te lira</p>
                    
                </div>
                @if ($available_seats > 0)
                <div class="flex-col mt-5  pb-6">
                    <h1 class="text-lg">Zgjidhni numrin e uleseve:</h1>
                    <input type="number" name="seats_booked" min="1" max="{{ $available_seats }}" required>
                </div>
                @else
                <p class="text-red-500">Nuk ka vende të lira për këtë udhëtim.</p>
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