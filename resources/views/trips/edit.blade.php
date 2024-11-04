<x-app-layout>
    @auth
    <head>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize flatpickr for date and time fields
                flatpickr("#departure_time", {
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    time_24hr: true
                });
                flatpickr("#arrival_time", {
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    time_24hr: true
                });
        
                // Handle form submission with AJAX
                document.getElementById('edit-trip-form').addEventListener('submit', function(e) {
                    e.preventDefault(); // Prevent default form submission
        
                    console.log('Update button clicked'); // Check if this line runs
                    
                    let formData = new FormData(this);
        
                    // Send AJAX request
                    fetch("{{ route('trips.update', $trip->id) }}", {
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(response => {
                        console.log('Response received'); // Log when response is received
                        return response.json();
                    })
                    .then(data => {
                        console.log('Response received');
                        if (data.success) {
                            alert('Trip updated successfully!');
                            window.location.href = data.redirect;
                        } else {
                            alert('There was an error updating the trip.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error); 
                    });
                });
            });
        </script>        
    </head>
    <div class="container mx-auto p-6">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 mt-12 w-full space-y-4 md:space-y-0">
            <h1 class="text-3xl font-bold text-gray-800">Edit Trip</h1>
            <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-2 mt-4 md:mt-0">
                <a href="{{ route('trips.index') }}" 
                   class="w-28 px-4 py-1 text-sm rounded-full transition duration-200 
                          {{ request()->routeIs('trips.index') ? 'bg-gray-100 text-gray-600' : 'bg-gray-200 text-gray-700' }}
                          hover:bg-gray-400 text-center">
                    Passenger
                </a>
                <a href="{{ route('trips.create') }}" 
                   class="w-28 px-4 py-1 text-sm rounded-full transition duration-200 
                          {{ request()->routeIs('trips.create') ? 'bg-blue-100 text-blue-600' : 'bg-gray-200 text-gray-700' }}
                          hover:bg-blue-300 text-center">
                    Driver
                </a>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-center p-6">
        <div class="hover:shadow-2xl hover:bg-gray-100 w-full max-w-lg ride-card bg-white p-6 rounded-lg transition-transform duration-500 transform hover:scale-105 shadow-md flex flex-col justify-between">
            <h1 class="text-3xl font-bold text-gray-800 mb-4 text-center">Edit Trip Details</h1>
            <form id="edit-trip-form" action="{{ route('trips.update', $trip->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="origin_city_id" class="block text-gray-700">Origin City</label>
                    <select id="origin_city_id" name="origin_city_id" required class="w-full border border-gray-300 p-2 rounded">
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ $trip->origin_city_id == $city->id ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="destination_city_id" class="block text-gray-700">Destination City</label>
                    <select id="destination_city_id" name="destination_city_id" required class="w-full border border-gray-300 p-2 rounded">
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ $trip->destination_city_id == $city->id ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="departure_time" class="block text-gray-700">Departure Time</label>
                    <input type="text" id="departure_time" name="departure_time" value="{{ $trip->departure_time }}" required class="w-full border border-gray-300 p-2 rounded">
                </div>
                <div>
                    <label for="arrival_time" class="block text-gray-700">Arrival Time</label>
                    <input type="text" id="arrival_time" name="arrival_time" value="{{ $trip->arrival_time }}" required class="w-full border border-gray-300 p-2 rounded">
                </div>
                <div>
                    <label for="available_seats" class="block text-gray-700">Available Seats</label>
                    <input type="number" id="available_seats" name="available_seats" value="{{ $trip->available_seats }}" required class="w-full border border-gray-300 p-2 rounded">
                </div>
                <div>
                    <label for="price" class="block text-gray-700">Price</label>
                    <input type="text" id="price" name="price" value="{{ $trip->price }}" required class="w-full border border-gray-300 p-2 rounded">
                </div>
                <div class="flex flex-col items-center space-y-4">
                    <button type="submit" 
                            class="px-3 py-1 text-xs rounded-full transition duration-200 bg-blue-500 text-white hover:bg-blue-600 w-[70px] h-[28px] max-w-full">
                        Update
                    </button>
                </div>
            </form>
            <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" class="flex flex-col items-center space-y-4 mt-6">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="px-3 py-1 text-xs rounded-full transition duration-200 bg-red-500 text-white hover:bg-red-600 w-[70px] h-[28px] max-w-full">
                    Delete
                </button>
            </form>
        </div>
    </div>
    @endauth
</x-app-layout>
