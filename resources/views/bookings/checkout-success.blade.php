<x-app-layout>
    <div class="flex justify-center items-center min-h-screen bg-gradient-to-r px-4 pt-2">
        <div class="w-full max-w-7xl mr-2 ml-2 mb-8 bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="bg-green-800 py-2 px-4">
                <div class="flex items-center space-x-4">
                    <svg fill="#ffffff" viewBox="-1.7 0 20.4 20.4" xmlns="http://www.w3.org/2000/svg" class="cf-icon-svg w-16 h-16"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M16.417 10.283A7.917 7.917 0 1 1 8.5 2.366a7.916 7.916 0 0 1 7.917 7.917zm-4.105-4.498a.791.791 0 0 0-1.082.29l-3.828 6.63-1.733-2.08a.791.791 0 1 0-1.216 1.014l2.459 2.952a.792.792 0 0 0 .608.285.83.83 0 0 0 .068-.003.791.791 0 0 0 .618-.393L12.6 6.866a.791.791 0 0 0-.29-1.081z"></path></g></svg>
                    <h1 class="text-3xl font-bold text-white">Payment Successful</h1>
                </div>
                <p class="mt-2 text-white text-lg">Your booking has been confirmed. Thank you for choosing us!</p>
            </div>
            @if ($booking)
                 <div class="py-6 px-8  grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                 <div class="bg-green-50 p-6 rounded-lg border-l-4 border-green-600 shadow-sm hover:shadow-lg transition duration-300">
                     <div class="flex items-center space-x-3 mb-3">
                       <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                         <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.315 0-10 1.675-10 5v2h20v-2c0-3.325-6.685-5-10-5z" />
                           </svg>
                         <h2 class="text-xl font-semibold text-green-800">Passenger Information</h2>
                             </div>
                            <div class="text-gray-700 space-y-2">
                            <p><strong>Full Name:</strong> {{ $booking->passenger->name }} {{$booking->passenger->lastname}}</p>
                            <p><strong>Email:</strong> {{ $booking->passenger->email }}</p>
                            <p><strong>Phone Number:</strong> {{ $booking->passenger->phone }}</p>
                        </div>
                    </div>
                    <div class="bg-green-50 p-6 rounded-lg border-l-4 border-green-600 shadow-sm hover:shadow-lg transition duration-300">
                     <h2 class="text-xl font-semibold text-green-800 mb-3 flex items-center">
                      <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600 mr-2" fill="currentColor" viewBox="0 0 122.88 120.98">
                          <defs>
                              <style>.cls-1{fill-rule:evenodd;}</style>
                          </defs>
                          <title>road-map</title>
                          <path class="cls-1" d="M23.46,90.44a30.26,30.26,0,0,1-6.64,5.5.93.93,0,0,1-1.07,0A37.48,37.48,0,0,1,6.5,87.72,29.39,29.39,0,0,1,.28,74.3,17.87,17.87,0,0,1,2.51,61.74,15.5,15.5,0,0,1,6,57.93,16.79,16.79,0,0,1,16.49,54a14.82,14.82,0,0,1,10,4.09,14.29,14.29,0,0,1,2.67,3.25c2.45,4,3,9.17,1.9,14.39a31.55,31.55,0,0,1-7.6,14.66Zm-7.07,10.73a9.89,9.89,0,0,1,9.19,6.21,3.27,3.27,0,0,1,.54,0h7.94a4,4,0,0,1,0,7.94H26.12a3.48,3.48,0,0,1-.73-.07,9.9,9.9,0,1,1-9-14ZM107.47,46.6a9.91,9.91,0,1,1-9.08,13.87H86a4,4,0,1,1,0-7.93H98.39a9.9,9.9,0,0,1,9.08-5.94ZM76.69,79.94a4,4,0,1,0,0,7.94h9.55a4,4,0,1,0,0-7.94ZM70.62,60.56a4,4,0,0,0-1.05-7.87,17.57,17.57,0,0,0-9.21,4.15,4,4,0,0,0,3.46,6.88,4.11,4.11,0,0,0,1.74-.88,9.65,9.65,0,0,1,5.06-2.28Zm-8,12.51A4,4,0,0,0,55,75.43l.18.54a17.72,17.72,0,0,0,5.45,7.84,4,4,0,0,0,5.06-6.12,9.83,9.83,0,0,1-3.11-4.62ZM49.93,107.34a4,4,0,0,0,0,7.94h7.94a4,4,0,1,0,0-7.94Zm23.82,0a4,4,0,0,0,0,7.94h7.94a4,4,0,1,0,0-7.94Zm22.55-.44a4,4,0,0,0-.12,7.52,3.92,3.92,0,0,0,2.53,0,17.64,17.64,0,0,0,8.35-5.67,4,4,0,1,0-6.15-5l-.2.23a9.81,9.81,0,0,1-4.41,2.89Zm5.78-13.68a4,4,0,0,0,7-3.68,17.91,17.91,0,0,0-7-7.27,4,4,0,1,0-3.94,6.89,9.93,9.93,0,0,1,3.86,4.06ZM114.75,36.4a30.65,30.65,0,0,1-6.65,5.5,1,1,0,0,1-1.07,0,37.39,37.39,0,0,1-9.24-8.25,29.44,29.44,0,0,1-6.22-13.42A17.81,17.81,0,0,1,93.8,7.7a15.32,15.32,0,0,1,3.44-3.82A16.73,16.73,0,0,1,107.78,0a15.39,15.39,0,0,1,12.67,7.33c2.45,4,3,9.18,1.9,14.39a31.62,31.62,0,0,1-7.6,14.67ZM107.08,8.14A7.86,7.86,0,1,1,99.22,16a7.85,7.85,0,0,1,7.86-7.86Zm-91.29,54A7.86,7.86,0,1,1,7.93,70a7.85,7.85,0,0,1,7.86-7.86Z"/>
                      </svg>
                      Trip Information
                  </h2>
                  <div class="text-gray-700 space-y-2">
                      <p><strong>From:</strong> {{ $booking->trip->originCity->name }}</p>
                      <p><strong>To:</strong> {{ $booking->trip->destinationCity->name }}</p>
                      <p><strong>Departure Time:</strong> {{ $booking->trip->departure_time->format('d/m H:i') }}</p>
                      <p><strong>Arrival Time:</strong> {{ $booking->trip->arrival_time->format('d/m H:i') }}</p>
                  </div>
             </div>
                   <div class="bg-green-50 p-6 rounded-lg border-l-4 border-green-600 shadow-sm hover:shadow-lg transition duration-300">
                   <h2 class="text-xl font-semibold text-green-800 mb-3 flex items-center">
                   <svg fill="currentColor" class="w-6 h-6  mr-2 text-green-600" fill="currentColor" viewBox="0 0 32 32" data-name="Layer 12" id="Layer_12" xmlns="http://www.w3.org/2000/svg" stroke="#538a00"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><path d="M20.69,24H3.53a1,1,0,0,1-1-1V11.34H26.76v7.05a0.5,0.5,0,0,0,1,0V8a2,2,0,0,0-2-2H24.07V4.5a0.5,0.5,0,0,0-1,0V5.93h-5V4.62a0.5,0.5,0,1,0-1,0V5.93h-5V4.62a0.5,0.5,0,1,0-1,0V5.93h-5V4.62a0.5,0.5,0,1,0-1,0V5.93H3.53a2,2,0,0,0-2,2v15a2,2,0,0,0,2,2H20.69A0.5,0.5,0,0,0,20.69,24ZM3.53,6.93H5.18V8.24a0.5,0.5,0,0,0,1,0V6.93h5V8.24a0.5,0.5,0,0,0,1,0V6.93h5V8.24a0.5,0.5,0,0,0,1,0V6.93h5V8.12a0.5,0.5,0,1,0,1,0V6.93h1.65a1,1,0,0,1,1,1v2.38H2.5V8A1,1,0,0,1,3.53,6.93Z"></path><rect height="1.92" width="1.92" x="9.21" y="13.03"></rect><rect height="1.92" width="1.92" x="13.71" y="13.03"></rect><rect height="1.92" width="1.92" x="18.21" y="13.02"></rect><rect height="1.92" width="1.92" x="4.71" y="16.7"></rect><rect height="1.92" width="1.92" x="9.21" y="16.7"></rect><rect height="1.92" width="1.92" x="13.71" y="16.7"></rect><rect height="1.92" width="1.92" x="4.71" y="20.41"></rect><rect height="1.92" width="1.92" x="9.21" y="20.41"></rect><rect height="1.92" width="1.92" x="13.71" y="20.39"></rect><rect height="1.92" width="1.92" x="18.21" y="20.39"></rect><rect height="1.92" width="1.92" x="18.21" y="16.69"></rect><rect height="1.92" width="1.92" x="22.63" y="13"></rect><rect height="1.92" width="1.92" x="22.63" y="16.67"></rect><path d="M26.32,19.65a4.18,4.18,0,1,0,4.17,4.17A4.18,4.18,0,0,0,26.32,19.65Zm0,7.35a3.18,3.18,0,1,1,3.17-3.18A3.18,3.18,0,0,1,26.32,27Z"></path><path d="M27.5,22.42L25.77,24.2l-0.67-.54a0.5,0.5,0,1,0-.63.77l1,0.83a0.5,0.5,0,0,0,.67,0l2.05-2.11A0.5,0.5,0,0,0,27.5,22.42Z"></path></g></svg>
                         Booking Information
                         </h2>
                              <div class="text-gray-700 space-y-3">
                      <p><strong>Total Seats Booked:</strong> {{ $booking->seats_booked }}</p>
                      <p><strong>Total Price:</strong> {{ $booking->total_price }}€</p>
                    </div>
                 </div>
              </div>
            @endif
            <div class="bg-white-100 mb-6 py-4 text-center">
                <a href="{{ route('bookings.show', $booking->id ) }}" class="px-6 py-3 bg-green-800 text-white text-lg font-medium rounded-lg shadow-md hover:bg-green-600 transition duration-300">Go to your Booking</a>
            </div>
        </div>
    </div>
</x-app-layout>
