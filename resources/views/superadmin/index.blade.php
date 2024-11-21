<x-app-layout>
    <div x-data="userSearch()" class="max-w-[1024px] mx-auto mt-28">


        <div class="w-full flex flex-col sm:flex-row justify-between items-center mb-3 mt-12 pl-3">
            <div class="flex gap-14 sm:mb-4 ">
                <button @click="currentTab = 'users'" :class="currentTab === 'users' ? 'underline' : ''" class="text-md sm:text-xl font-bold text-black">
                    Users
                </button>
                <button @click="currentTab = 'bookings'" :class="currentTab === 'bookings' ? 'underline' : ''" class="text-md sm:text-xl font-bold text-black">
                    Bookings
                </button>
                <button @click="currentTab = 'trips'" :class="currentTab === 'trips' ? 'underline' : ''" class="text-md sm:text-xl font-bold text-black">
                    Trips
                </button>
            </div>
            <div class="mx-3">
                <div class="w-full max-w-sm min-w-[200px] relative">
                    <div class="relative">
                        <input
                                class="bg-white w-full pr-11 h-10 pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                                id="search"
                                name="search"
                                type="search"
                                x-model="search"
                                placeholder="Search"
                        />
                        <button
                                class="absolute h-8 w-8 right-1 top-1 my-auto px-2 flex items-center bg-white rounded "
                                type="button"
                                @click="filteredUsers()"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-8 h-8 text-slate-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="currentTab === 'users'" class="relative flex flex-col w-full h-full overflow-y-auto max-h-[calc(80vh-100px)] text-gray-700 bg-white shadow-md rounded-lg bg-clip-border ">
            <table class="w-full text-left table-auto min-w-max">
                <thead>
                <tr class="border-b border-slate-300 bg-blue-500">
                    <th class="p-4 text-sm font-normal leading-none text-white">Image</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Name</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Phone</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">City</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Email</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Joined</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Super Admin</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Edit</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Delete</th>
                </tr>
                </thead>
                <tbody>
                <template x-for="user in filteredUsers()" :key="user.id">
                <tr class="bg-blue-50">
                    <td class="p-4 border-b border-slate-200 py-5">
                        <img class="w-14 h-14 object-cover rounded-full"
                             :src="user.image ? `{{ asset('storage/') }}/${user.image}` : `https://eu.ui-avatars.com/api/${user.name}+${user.lastname}`"
                             alt="User Image">
                    </td>
                    <td class="p-4 border-b border-slate-200 py-5" x-text="`${user.name || ''} ${user.lastname || ''}`"></td>
                    <td class="p-4 border-b border-slate-200 py-5" x-text="user.phone || ''"></td>
                    <td class="p-4 border-b border-slate-200 py-5" x-text="user.city || ''"></td>
                    <td class="p-4 border-b border-slate-200 py-5" x-text="user.email || ''"></td>
                    <td class="p-4 border-b border-slate-200 py-5" x-text="formatDate(user.created_at) || ''"></td>
                    <td class="p-4 border-b border-slate-200 py-5" x-text="user.is_super_admin == 1 ? 'Yes' : 'No'"></td>
                    <td class="p-4 border-b border-slate-200 py-5">
                        <a :href="`{{ route('superadmin.edit', '') }}/${user.id}`">
                        <button type="button" class="text-slate-500 hover:text-slate-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                            </svg>
                        </button>
                        </a>
                    </td>
                    <td class="p-4 border-b border-slate-200 py-5">
                        <form :action="`{{ route('users.destroy', '') }}/${user.id}`" method="POST" @submit.prevent="confirmDelete($event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-slate-500 hover:text-slate-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                </template>
                </tbody>
            </table>
        </div>


        <div id="bookings" x-show="currentTab === 'bookings'" class="relative flex flex-col w-full h-full overflow-y-auto max-h-[calc(80vh-100px)] text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
            <table class="w-full text-left table-auto min-w-max">
                <thead>
                <tr class="border-b border-slate-300 bg-blue-500">
                    <th class="p-4 text-sm font-normal leading-none text-white">Trip Id</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Passenger</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Seats Booked</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Status</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Delete</th>
                </tr>
                </thead>
                <tbody>
                <template x-for="booking in filteredBookings()" :key="booking.id">
                    <tr class="bg-blue-50">
                        <td class="p-4 border-b border-slate-200 py-5" x-text="booking.trip_id"></td>
                        <td class="p-4 border-b border-slate-200 py-5" x-text="booking.passenger.name"></td>
                        <td class="p-4 border-b border-slate-200 py-5" x-text="booking.seats_booked"></td>
                        <td class="p-4 border-b border-slate-200 py-5" x-text="booking.status"></td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <form :action="`{{ route('booking.delete', '') }}/${booking.id}`" method="POST" @submit.prevent="confirmDelete($event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-slate-500 hover:text-slate-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                </template>
                </tbody>
            </table>
        </div>

        <div id="trips" x-show="currentTab === 'trips'" class="relative flex flex-col w-full h-full overflow-y-auto max-h-[calc(80vh-100px)] text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
            <table class="w-full text-left table-auto min-w-max">
                <thead>
                <tr class="border-b border-slate-300 bg-blue-500">
                    <th class="p-4 text-sm font-normal leading-none text-white">Driver</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Origin City</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Destination City</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Departure Time</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Arrival Time</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Available Seats</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Price</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Edit</th>
                    <th class="p-4 text-sm font-normal leading-none text-white">Delete</th>
                </tr>
                </thead>
                <tbody>
                <template x-for="trip in filteredTrips()" :key="trip.id">
                    <tr class="bg-blue-50">
                        <td class="p-4 border-b border-slate-200 py-5" x-text="trip.users.name"></td>
                        <td class="p-4 border-b border-slate-200 py-5" x-text="trip.origincity.name"></td>
                        <td class="p-4 border-b border-slate-200 py-5" x-text="trip.destinationcity.name"></td>
                        <td class="p-4 border-b border-slate-200 py-5" x-text="new Date(trip.departure_time).toLocaleString('en-GB', { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' })"></td>
                        <td class="p-4 border-b border-slate-200 py-5" x-text="new Date(trip.arrival_time).toLocaleString('en-GB', { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' })"></td>
                        <td class="p-4 border-b border-slate-200 py-5" x-text="trip.available_seats"></td>
                        <td class="p-4 border-b border-slate-200 py-5" x-text="trip.price"></td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <a :href="`/superadmin/${trip.id}/edit-trip`">
                                <button type="button" class="text-slate-500 hover:text-slate-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                    </svg>
                                </button>
                            </a>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <form :action="`{{ route('trip.delete', '') }}/${trip.id}`" method="POST" @submit.prevent="confirmDelete($event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-slate-500 hover:text-slate-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                </template>
                </tbody>
            </table>
        </div>

    </div>

        <script>
            function userSearch() {
                return {
                    search: '',
                    currentTab: new URLSearchParams(window.location.search).get('tab') || 'users',
                    users: @json($users),
                    bookings: @json($bookings),
                    trips: @json($trips),
                    filteredUsers() {
                        if (this.search === '') {
                            return this.users;
                        }
                        return this.users.filter(user =>
                            (user.name && user.name.toLowerCase().includes(this.search.toLowerCase())) ||
                            (user.lastname && user.lastname.toLowerCase().includes(this.search.toLowerCase())) ||
                            (user.phone && user.phone.includes(this.search)) ||
                            (user.city && user.city.toLowerCase().includes(this.search.toLowerCase())) ||
                            (user.email && user.email.toLowerCase().includes(this.search.toLowerCase())) ||
                            (user.created_at && user.created_at.includes(this.search)) ||
                            (user.role && user.role.toLowerCase().includes(this.search.toLowerCase()))
                        );
                    },
                    filteredBookings() {
                        if (this.search === '') return this.bookings;
                        return this.bookings.filter(booking =>
                            (booking.trip_id && booking.trip_id.toString().includes(this.search)) ||
                            (booking.passenger && booking.passenger.name.toLowerCase().includes(this.search.toLowerCase())) ||
                            (booking.seats_booked && booking.seats_booked.toString().includes(this.search)) ||
                            (booking.status && booking.status.toLowerCase().includes(this.search.toLowerCase()))
                        );
                    },
                    filteredTrips() {
                        if (this.search === '') return this.trips;
                        return this.trips.filter(trip =>
                            (trip.users && trip.users.name.toLowerCase().includes(this.search.toLowerCase())) ||
                            (trip.origincity && trip.origincity.name.toLowerCase().includes(this.search.toLowerCase())) ||
                            (trip.destinationcity && trip.destinationcity.name.toLowerCase().includes(this.search.toLowerCase())) ||
                            (trip.departure_time && trip.departure_time.includes(this.search)) ||
                            (trip.arrival_time && trip.arrival_time.includes(this.search)) ||
                            (trip.available_seats && trip.available_seats.toString().includes(this.search)) ||
                            (trip.price && trip.price.toString().includes(this.search))
                        );
                    },
                    formatDate(dateString) {
                        const date = new Date(dateString);
                        const day = String(date.getDate()).padStart(2, '0');
                        const month = String(date.getMonth() + 1).padStart(2, '0');
                        const year = date.getFullYear();
                        return `${day}/${month}/${year}`;
                    }
                };
            }
                function confirmDelete(event) {
                    if (confirm('Are you sure you want to delete?')) {
                        event.target.submit();
                    } else {
                        event.preventDefault();
                    }
                }
        </script>




</x-app-layout>
