<x-app-layout>
    <div class=" flex items-center justify-center mt-28">
        <div class="max-w-7xl w-full p-6 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg shadow-lg mx-4 sm:mx-8 md:mx-12">
            <div class="flex items-center justify-center space-x-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12c0-4.97-4.03-9-9-9S3 7.03 3 12s4.03 9 9 9c2.94 0 5.59-1.38 7.36-3.5L20.07 18.9A10.014 10.014 0 0 0 21 12z" />
                </svg>
                <div>
                    <h1 class="text-3xl font-semibold text-center">{{ __('messages.Payment Successful!') }}</h1>
                    <p class="mt-2 text-lg text-center">{{ __('messages.Your booking has been confirmed.') }}</p>
                </div>
            </div>
            @if ($booking)
                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="p-4 border border-green-300 rounded-lg">
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19c0-1.656-1.344-3-3-3s-3 1.344-3 3h6zM12 4c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/>
                            </svg>
                            <h3 class="text-xl font-medium">{{ __('messages.Passenger Information') }}</h3>
                        </div>
                        <div class="mt-4 text-sm space-y-2">
                            <p><strong>{{ __('messages.Full Name:') }}</strong> {{ $booking->passenger->name }} {{$booking->passenger->lastname}}</p>
                            <p><strong>{{ __('messages.Email:') }}</strong> {{ $booking->passenger->email }}</p>
                            <p><strong>{{ __('messages.Phone Number:') }}</strong> {{ $booking->passenger->phone }}</p>
                        </div>
                    </div>
                    <div class="p-4 border border-green-300 rounded-lg">
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h18M3 12h18M3 18h18"/>
                            </svg>
                            <h3 class="text-xl font-medium">{{ __('messages.Trip Information') }}</h3>
                        </div>
                        <div class="mt-4 text-sm space-y-2">
                            <p><strong>{{ __('messages.From:') }}</strong> {{ $booking->trip->originCity->name }}</p>
                            <p><strong>{{ __('messages.To:') }}</strong> {{ $booking->trip->destinationCity->name }}</p>
                            <p><strong>{{ __('messages.Departure Time:') }}</strong> {{ $booking->trip->departure_time->format('d/m H:i') }}</p>
                            <p><strong>{{ __('messages.Arrival Time:') }}</strong> {{ $booking->trip->arrival_time->format('d/m H:i') }}</p>
                        </div>
                    </div>
                    <div class="p-4 border border-green-300 rounded-lg">
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 11l3 3l3-3m0 4v-4m-6 4v-4"/>
                            </svg>
                            <h3 class="text-xl font-medium">{{ __('messages.Booking Information') }}</h3>
                        </div>
                        <div class="mt-4 text-sm space-y-2">
                            <p><strong>{{ __('messages.Total Seats Booked:') }}</strong> {{ $booking->seats_booked }}</p>
                            <p><strong>{{ __('messages.Total Price:') }}</strong> {{ $booking->total_price }}€</p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="mt-6 text-center">
                <a href="{{ route('bookings.show', $booking->id ) }}" class="text-blue-500 hover:text-blue-700">{{ __('messages.Go to your Booking') }}</a>
            </div>
        </div>
    </div>
</x-app-layout>
