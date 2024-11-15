<section>
    <header>
        <!-- Mobile Menu -->
        <div class="block md:hidden bg-blue-600 text-white p-4">
            <div class="block md:hidden bg-blue-600 text-white px-0 py-2 rounded space-y-4">
                <a href="{{ route('dashboard') }}" class="block text-white hover:text-blue-300 text-lg pl-4">Dashboard</a>
                <a href="{{ route('trips.index') }}" clas="block text-white hover:text-blue-300 text-lg pl-4">Trips</a>
            </div>  
        </div>
        <div class="flex flex-col md:flex-row">
            <!-- Sidebar -->
            <div class="bg-blue-600 text-white p-6 md:w-1/4 w-full md:block hidden">
                <h2 class="text-2xl font-bold mb-6">My Profile</h2> 
                <nav class="space-y-4">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 text-white hover:text-blue-300">
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('trips.index') }}" class="flex items-center space-x-2 text-white hover:text-blue-300">
                        <span>Trips</span>
                    </a>
                </nav>
            </div>
            <!-- Main Content -->
            <div class="w-full md:w-3/4">
                <div class="bg-white p-4 md:p-6 rounded-lg shadow-md mx-auto w-11/12 md:w-full">
                    <h2 class="text-2xl font-bold mb-4 md:mb-6">Edit Profile</h2>

                    @if(session('status'))
                        <div class="text-green-500 mb-4">{{ session('status') }}</div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <!-- Profile Image and Edit Button -->
                <div class="md:ml-auto flex-col items-center mr-20 text-center">
                    <!-- Profile Image -->
                    @if(auth()->user()->image)
                    <img id="profileImage" 
                        src="{{ asset('storage/' . auth()->user()->image) }}" 
                        alt="User Image" 
                        class="border-2 border-[#76A8B2] w-40 h-40 rounded-full">

                    @else
                        <img id="profileImage"
                            src="https://eu.ui-avatars.com/api/?name={{ auth()->user()->name }}+{{ auth()->user()->lastname }}&size=250"
                            alt="Default Image"
                            class="border-2 border-[#76A8B2] w-40 h-40 rounded-full">
                    @endif
                    <div class="flex flex-col items-start pt-4 px-6 justify-start w-full">
                        <div class="flex items-center justify-end mb-10 md:mb-10">
                            <label for="image" class="inline-block px-4 py-2 bg-blue-500 text-white font-medium rounded-md cursor-pointer hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 translate-y-[-5px]">
                                Edit Image
                            </label>
                        </div>

                        <div class="flex items-center mb-4 md:mb-0">
                            <input id="image" class="hidden" type="file" name="image" accept="image/*" onchange="previewImage(event)">
                        </div>

                    </div>
                
                    
                </div>
            

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <!-- First Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">First Name</label>
                                <input type="text" name="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ old('name', $user->name) }}">
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" name="lastname" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ old('lastname', $user->lastname) }}">
                                <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
                            </div>

                            <!-- Email (readonly) -->
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" readonly class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <!-- Phone Number -->
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="text" name="phone" id="phone" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ old('phone', $user->phone ) }}">
                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                            </div>

                            <!-- Address -->
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Address</label>
                                <input type="text" name="address" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ old('address', $user->address) }}">
                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
                            </div>

                            <!-- City -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">City</label>
                                <input type="text" name="city" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ old('city', $user->city) }}">
                                <x-input-error class="mt-2" :messages="$errors->get('city')" />
                            </div>

                            <!-- Birthday -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Birthday</label>
                                <input type="date" name="birthday" value="{{ old('birthday', $user->birthday) }}" readonly class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
                            </div>

                            
                            <!-- Save Button -->
                        <div class="mt-4 md:mt-6 col-span-1 md:col-span-2">
                            <button type="submit" class="bg-blue-500 text-white py-2 px-6  rounded-md font-bold hover:bg-blue-600">Save</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
</section>
