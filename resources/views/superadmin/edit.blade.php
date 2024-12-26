<x-app-layout>
    <head>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                flatpickr("#birthday", {
                    dateFormat: "Y-m-d",
                });
            });
        </script>
    </head>

    <div class="flex items-center justify-center p-6 mt-12">
        <div class="hover:shadow-2xl  w-full max-w-lg ride-card bg-white p-6 rounded-lg transition-transform duration-500 transform  shadow-md flex flex-col justify-between">
            <h1 class="text-3xl font-bold text-gray-800 mb-4 text-center">Edit User</h1>
            <form id="edit-trip-form" action="{{route('superadmin.update', $user->id)}}" method="POST" class="space-y-6">
                @csrf
                @method('patch')

                <div class="flex justify-between items-center space-x-2 md:space-x-4">
                    <div class="w-full md:w-1/2">
                        <label for="arrival_time" class="block text-gray-700">Name:</label>
                        <input type="text" id="name" name="name"
                               class="border border-gray-300 rounded-md px-2 py-2 bg-white shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                               min="1" placeholder="Name" value="{{ $user->name }}">
                    </div>
                    <div class="w-full md:w-1/2">
                        <label for="arrival_time" class="block text-gray-700">Lastname:</label>
                        <input type="text" id="lastname" name="lastname"
                               class="border border-gray-300 rounded-md px-2 py-2 bg-white shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                               min="1" placeholder="Lastname" value="{{ $user->lastname}}">
                    </div>
                </div>
                <div class="relative">
                    <label for="arrival_time" class="block text-gray-700">Email:</label>
                    <input type="text" id="email" name="email"
                           class="border border-gray-300 rounded-md px-2 py-2 bg-white shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                           min="1" placeholder="Email:" value="{{ $user->email }}">
                </div>
                <div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-4">
                    <div class="flex flex-col w-full relative">
                        <label for="departure_time" class="block text-gray-700">City:</label>
                        <div class="relative">
                            <input type="text" id="city" name="city"
                                   class="border border-gray-300 rounded-md px-2 py-2 bg-white shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                                   min="1" placeholder="City" value="{{  $user->city }}">
                        </div>
                    </div>

                    <div class="flex flex-col w-full relative">
                        <label for="arrival_time" class="block text-gray-700">Phone:</label>
                        <div class="relative">
                            <input type="text" id="phone" name="phone"
                                   class="border border-gray-300 rounded-md px-2 py-2 bg-white shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                                   min="1" placeholder="Phone" value="{{ $user->phone }}">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-4">
                    <div class="flex flex-col w-full relative">
                        <label for="birthday" class="block text-gray-700">Joined:</label>
                        <div class="relative">
                            <input type="text" id="created_at" name="created_at"
                                   value="{{ $user->created_at }}" readonly
                                   class="border border-gray-300 rounded-md px-3 py-2 pl-2 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 w-full"
                                   placeholder="Departure Time:">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-2.5" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                                <rect x="3" y="6" width="18" height="15" rx="2" stroke="#33363F" stroke-width="2"/>
                                <path d="M3 10C3 8.11438 3 7.17157 3.58579 6.58579C4.17157 6 5.11438 6 7 6H17C18.8856 6 19.8284 6 20.4142 6.58579C21 7.17157 21 8.11438 21 10H3Z" fill="#33363F"/>
                                <path d="M7 3L7 6" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                <path d="M17 3L17 6" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                <rect x="7" y="12" width="4" height="2" rx="0.5" fill="#33363F"/>
                                <rect x="7" y="16" width="4" height="2" rx="0.5" fill="#33363F"/>
                                <rect x="13" y="12" width="4" height="2" rx="0.5" fill="#33363F"/>
                                <rect x="13" y="16" width="4" height="2" rx="0.5" fill="#33363F"/>
                            </svg>
                        </div>
                    </div>

                    <div class="flex flex-col w-full relative">
                        <label for="arrival_time" class="block text-gray-700">Role:</label>
                        <div class="relative">
                            <input type="text" id="role" name="role"
                                   class="border border-gray-300 rounded-md px-2 py-2 bg-white shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                                   min="1" placeholder="Role" value="{{ $user->role }}">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center space-y-4">
                    <button type="submit"
                            class="px-3 py-1 text-xs rounded-lg transition duration-200 bg-blue-500 text-white hover:bg-blue-600 w-[80px] h-[30px] max-w-full">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
