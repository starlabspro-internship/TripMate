<x-app-layout>
    <div class=" min-h-screen">
    <div class="container mx-auto px-4 py-6 ">
        <h2 class="text-2xl font-semibold text-center mt-16 mb-6">
            {{ "Upcoming Bookings for " . auth()->user()->name ."'s Trips"}}
        </h2>
        <div class="flex justify-center gap-2 mb-4">
            <button onclick="filterBookings('all')"
                    class="px-4 py-2 rounded-2xl bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium text-sm">
                All
            </button>
            <button onclick="filterBookings('paid')"
                    class="px-4 py-2 rounded-2xl bg-green-600 hover:bg-green-700 text-white font-medium text-sm">
                Paid
            </button>
            <button onclick="filterBookings('refunded')"
                    class="px-4 py-2 rounded-2xl bg-red-600 hover:bg-red-700 text-white font-medium text-sm">
                Refunded
            </button>
        </div>
        <div id="bookings-container" class="space-y-4">
            @forelse ($bookings->filter(fn($booking) => $booking->trip) as $booking)
                <div class="bg-white shadow-md rounded-lg border border-gray-200 overflow-hidden max-w-4xl mx-auto" data-status="{{ $booking->status }}">
                    <div class="flex justify-between items-center p-4 cursor-pointer bg-gray-100 " onclick="toggleDetails(this)">
                        <div>
                            <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" width="30px" height="30px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" id="Layer_1" version="1.1" xml:space="preserve">
                                <path d="M39.092,20.218c-1.368-0.565-2.83-0.8-4.038-0.889c-0.096-0.165-0.192-0.329-0.29-0.492  c-0.258-0.433-0.503-0.842-0.703-1.26c-1.98-4.134-4.973-5.889-9.139-5.354c-0.563,0.071-1.224-0.076-1.925-0.232  c-0.472-0.105-0.959-0.214-1.466-0.268c-3.204-0.34-5.437,0.635-6.837,2.978c-0.658,1.102-1.383,2.201-2.084,3.264  c-0.32,0.485-0.641,0.971-0.956,1.458c-0.005,0.008-0.005,0.019-0.011,0.027c-1.388,0.265-2.779,0.932-3.692,1.818  C6.486,22.69,5.845,24.361,6.096,26.1c0.322,2.235,2.1,4.313,5.002,5.866c0,0.001,0.001,0.003,0.002,0.005  c1.04,1.824,2.323,4.078,5.271,4.078c0.121,0,0.244-0.004,0.37-0.012c2.168-0.132,3.636-1.367,4.388-3.645l6.263-0.241  c0.03,0.063,0.061,0.12,0.091,0.184c0.264,0.562,0.562,1.198,1.076,1.714c1.037,1.043,2.214,1.586,3.423,1.586  c0.119,0,0.239-0.005,0.358-0.016c1.711-0.151,3.36-1.343,4.903-3.53c2.172-0.258,4.573-1.068,5.026-4.447  C42.769,23.91,41.641,21.273,39.092,20.218z M16.411,15.727c0.999-1.671,2.466-2.271,4.908-2.015  c0.394,0.042,0.806,0.134,1.243,0.231c0.838,0.188,1.708,0.381,2.614,0.264c3.289-0.42,5.477,0.886,7.081,4.236  c0.138,0.286,0.288,0.559,0.441,0.826c-5.654-0.065-12.104-0.101-18.57,0.026c0.05-0.076,0.1-0.153,0.15-0.229  C14.992,17.985,15.73,16.867,16.411,15.727z M16.619,34.041c-1.738,0.111-2.541-0.925-3.575-2.703  c1.203-2.837,2.312-2.756,3.622-2.342c1.47,0.462,2.29,1.252,2.646,2.553C18.831,33.207,18.02,33.955,16.619,34.041z M32.164,33.627  c-0.74,0.066-1.471-0.268-2.188-0.988c-0.269-0.27-0.479-0.719-0.682-1.152c-0.037-0.079-0.074-0.158-0.111-0.235  c0.866-1.669,2.208-2.405,4.464-2.458l1.728,2.474C34.279,32.724,33.175,33.537,32.164,33.627z M40.287,27.376  c-0.234,1.751-1.088,2.459-3.289,2.723l-2.01-2.88c-0.184-0.262-0.481-0.42-0.802-0.427c-3.23-0.052-5.365,1.021-6.662,3.354  l-6.492,0.25c-0.629-1.623-1.868-2.71-3.767-3.308c-3.15-0.99-4.761,0.759-5.762,2.808c-1.979-1.181-3.222-2.642-3.429-4.081  c-0.158-1.094,0.27-2.141,1.269-3.112c0.795-0.772,2.247-1.353,3.453-1.381c7.388-0.173,14.852-0.116,21.18-0.038  c1.656,0.021,3.161,0.291,4.352,0.782C40.418,22.932,40.547,25.432,40.287,27.376z"/>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900 flex items-center gap-2">
                                {{ $booking->trip->origincity->name }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-900" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                </svg>
                                {{ $booking->trip->destinationcity->name }}
                            </h3>
                        </div>
                            <p class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 ml-1" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                                    <rect x="3" y="6" width="18" height="15" rx="2" stroke="#33363F" stroke-width="2"/>
                                    <path d="M3 10C3 8.11438 3 7.17157 3.58579 6.58579C4.17157 6 5.11438 6 7 6H17C18.8856 6 19.8284 6 20.4142 6.58579C21 7.17157 21 8.11438 21 10H3Z" fill="#33363F"/>
                                    <path d="M7 3L7 6" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M17 3L17 6" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                    <rect x="7" y="12" width="4" height="2" rx="0.5" fill="#33363F"/>
                                    <rect x="7" y="16" width="4" height="2" rx="0.5" fill="#33363F"/>
                                    <rect x="13" y="12" width="4" height="2" rx="0.5" fill="#33363F"/>
                                    <rect x="13" y="16" width="4" height="2" rx="0.5" fill="#33363F"/>
                                </svg>
                                &nbsp;&nbsp;{{ $booking->trip->departure_time->format('d/m') }}
                            </p>
                            <p class="text-sm text-gray-500 ml-1 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.4013 7.5H19C19.2761 7.5 19.5 7.27614 19.5 7C19.5 6.72386 19.2761 6.5 19 6.5H15.0415C15.1017 6.85896 15.2257 7.19631 15.4013 7.5ZM13.2289 7.5C13.1282 7.17938 13.0589 6.84484 13.0247 6.5H5C4.72386 6.5 4.5 6.72386 4.5 7C4.5 7.27614 4.72386 7.5 5 7.5H13.2289ZM5 11.5C4.72386 11.5 4.5 11.7239 4.5 12C4.5 12.2761 4.72386 12.5 5 12.5H19C19.2761 12.5 19.5 12.2761 19.5 12C19.5 11.7239 19.2761 11.5 19 11.5H5ZM5 16.5C4.72386 16.5 4.5 16.7239 4.5 17C4.5 17.2761 4.72386 17.5 5 17.5H19C19.2761 17.5 19.5 17.2761 19.5 17C19.5 16.7239 19.2761 16.5 19 16.5H5Z" fill="#222222"/>
                                <circle cx="18" cy="6" r="3" fill="#222222"/>
                                </svg>&nbsp;&nbsp;{{ ucfirst($booking->status) }}</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 15l-6-6h12l-6 6z"/>
                        </svg>
                    </div>
                    <div class="details hidden px-4 py-2 text-gray-800">
                        <p class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mb-0.5 ml-1" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                                <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 6V12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.24 16.24L12 12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            {{ $booking->trip->departure_time->format('H:i') }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-900" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                            {{ $booking->trip->arrival_time->format('H:i') }}
                        </p>
                        <p class="flex items-center gap-2 ml-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 16 16" fill="none">
                            <path d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685 6.34315 7 8 7Z" fill="#000000"/>
                            <path d="M14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z" fill="#000000"/>
                            </svg><span>Passenger:</span> {{ $booking->passenger->name }} {{ $booking->passenger->lastname }}</p>
                        <p class="flex items-center gap-2 ml-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                            <path d="M16 8.94444C15.1834 7.76165 13.9037 7 12.4653 7C9.99917 7 8 9.23858 8 12C8 14.7614 9.99917 17 12.4653 17C13.9037 17 15.1834 16.2384 16 15.0556M7 10.5H11M7 13.5H11M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg><span>Price:</span> {{ $booking->trip->price }} €</p>
                        <p class="flex items-center gap-2 ml-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.4" d="M17.9981 7.16C17.9381 7.15 17.8681 7.15 17.8081 7.16C16.4281 7.11 15.3281 5.98 15.3281 4.58C15.3281 3.15 16.4781 2 17.9081 2C19.3381 2 20.4881 3.16 20.4881 4.58C20.4781 5.98 19.3781 7.11 17.9981 7.16Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path opacity="0.4" d="M16.9675 14.4402C18.3375 14.6702 19.8475 14.4302 20.9075 13.7202C22.3175 12.7802 22.3175 11.2402 20.9075 10.3002C19.8375 9.59016 18.3075 9.35016 16.9375 9.59016" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path opacity="0.4" d="M5.96656 7.16C6.02656 7.15 6.09656 7.15 6.15656 7.16C7.53656 7.11 8.63656 5.98 8.63656 4.58C8.63656 3.15 7.48656 2 6.05656 2C4.62656 2 3.47656 3.16 3.47656 4.58C3.48656 5.98 4.58656 7.11 5.96656 7.16Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path opacity="0.4" d="M6.9975 14.4402C5.6275 14.6702 4.1175 14.4302 3.0575 13.7202C1.6475 12.7802 1.6475 11.2402 3.0575 10.3002C4.1275 9.59016 5.6575 9.35016 7.0275 9.59016" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.0001 14.6302C11.9401 14.6202 11.8701 14.6202 11.8101 14.6302C10.4301 14.5802 9.33008 13.4502 9.33008 12.0502C9.33008 10.6202 10.4801 9.47021 11.9101 9.47021C13.3401 9.47021 14.4901 10.6302 14.4901 12.0502C14.4801 13.4502 13.3801 14.5902 12.0001 14.6302Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.0907 17.7804C7.6807 18.7204 7.6807 20.2603 9.0907 21.2003C10.6907 22.2703 13.3107 22.2703 14.9107 21.2003C16.3207 20.2603 16.3207 18.7204 14.9107 17.7804C13.3207 16.7204 10.6907 16.7204 9.0907 17.7804Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>Seats Booked: {{ $booking->seats_booked }}</p>
                        <p class="flex items-center gap-2 ml-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mb-0.5" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                            <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 6V12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.24 16.24L12 12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg><span>Booking Time:</span> {{ $booking->created_at->format('H:i') }}</p>
                        <p class="flex items-center gap-2 ml-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mb-1" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                            <rect x="3" y="6" width="18" height="15" rx="2" stroke="#33363F" stroke-width="2"/>
                            <path d="M3 10C3 8.11438 3 7.17157 3.58579 6.58579C4.17157 6 5.11438 6 7 6H17C18.8856 6 19.8284 6 20.4142 6.58579C21 7.17157 21 8.11438 21 10H3Z" fill="#33363F"/>
                            <path d="M7 3L7 6" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                            <path d="M17 3L17 6" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                            <rect x="7" y="12" width="4" height="2" rx="0.5" fill="#33363F"/>
                            <rect x="7" y="16" width="4" height="2" rx="0.5" fill="#33363F"/>
                            <rect x="13" y="12" width="4" height="2" rx="0.5" fill="#33363F"/>
                            <rect x="13" y="16" width="4" height="2" rx="0.5" fill="#33363F"/>
                        </svg><span>Booking Date:</span> {{ $booking->created_at->format('d/m/Y') }}</p>
                        @if ($booking->status == 'paid' && now()->lessThan($booking->trip->departure_time))
                        <form action="{{ route('bookings.refund', $booking->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to cancel and refund this booking?');">
                            @csrf
                            <button type="submit"
                                class="mt-4 w-auto bg-red-500 text-white py-1 px-3 rounded-full text-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                                Cancel & Refund
                            </button>
                        </form>
                    @else
                        <p class="mt-4 text-center text-sm text-gray-500">
                            This booking cannot be modified at this time.
                        </p>
                    @endif
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500">No bookings available for your trips.</p>
            @endforelse
        </div>
    </div>
</div>
<script >
    function filterBookings(status) {
        const bookings = document.querySelectorAll('#bookings-container .bg-white');
            bookings.forEach(booking => {
            const bookingStatus = booking.getAttribute('data-status');
                if (status === 'all' || bookingStatus === status) {
                    booking.style.display = 'block';
                } else {
                    booking.style.display = 'none';
                }
            });
        }
    function toggleDetails(element) {
        const details = element.nextElementSibling;
            if (details.style.display === 'block') {
                details.style.display = 'none';
            } else {
                details.style.display = 'block';
            }
        }
</script>
</x-app-layout>
