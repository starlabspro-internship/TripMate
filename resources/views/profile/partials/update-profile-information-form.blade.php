<section>
    <header>
        <div class="flex flex-col md:flex-row">
            <!-- Main Content -->
            <div class="w-full">
                <div class="bg-white p-4 md:p-6  mx-auto  md:w-full">
                    <h2 class="text-2xl font-bold mb-4 md:mb-6">{{ __('messages.Edit Profile') }}</h2>

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
                            <label for="image" class="inline-block px-4 py-2 bg-customgreen-400 text-white font-medium rounded-md cursor-pointer hover:bg-customgreen-500 focus:outline-none focus:ring-2 focus:ring-customgreen-400 focus:ring-offset-2 translate-y-[-5px]">
                                {{ __('messages.Edit Image') }}
                            </label>
                        </div>

                        <div class="flex items-center mb-4 md:mb-0">
                            <input id="image" class="hidden" type="file" name="image" onchange="previewImage(event)">
                        </div>

                    </div>


                </div>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <!-- First Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">{{ __('messages.First Name:') }}</label>
                                <input type="text" name="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ old('name', $user->name) }}">
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">{{ __('messages.Last Name:') }}</label>
                                <input type="text" name="lastname" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ old('lastname', $user->lastname) }}">
                                <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
                            </div>

                            <!-- Email (readonly) -->
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">{{ __('messages.Email:') }}</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <!-- Phone Number -->
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">{{ __('messages.Phone Number:') }}</label>
                                <input type="text" name="phone" id="phone" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ old('phone', $user->phone ) }}">
                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                            </div>

                            <!-- Address -->
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">{{ __('messages.Address:') }}</label>
                                <input type="text" name="address" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ old('address', $user->address) }}">
                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
                            </div>

                            <!-- City -->
                            <div x-data="{ open: false, selected: { id: null, name: '{{ old('city', $user->city ?? 'Select a city') }}' } }" class="relative">
                                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.City:') }}</label>
                                <input type="hidden" name="city" x-model="selected.name"/>
                                <button 
                                    type="button" 
                                    @click="open = !open" 
                                    class="w-full text-sm px-3 py-[10px] focus:bg-gray-100 border border-gray-200 rounded-lg flex justify-between items-center"
                                    aria-haspopup="listbox" 
                                    :aria-expanded="open">
                                    <span x-text="selected.name ? selected.name : 'Select a city'"></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.23 7.29a1 1 0 011.41 0L10 10.58l3.36-3.29a1 1 0 111.36 1.42l-4 3.93a1 1 0 01-1.36 0l-4-3.93a1 1 0 010-1.42z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <ul 
                                    x-show="open" 
                                    @click.away="open = false" 
                                    class="absolute mt-1 w-full bg-white shadow-md max-h-60 rounded-md overflow-auto z-10 border border-gray-200 focus:outline-none"
                                    role="listbox">
                                    @foreach ($cities as $city)
                                        <li 
                                            @click="selected = { id: '{{ $city->id }}', name: '{{ $city->name }}' }; open = false;" 
                                            :class="selected && selected.id == '{{ $city->id }}' ? 'bg-indigo-600 text-white' : 'text-gray-900'" 
                                            class="cursor-pointer select-none relative py-2 px-3 hover:bg-indigo-100">
                                            <span class="block truncate">{{ $city->name }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Birthday -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">{{ __('messages.Birthday:') }}</label>
                                    <input type="text" name="birthday" value="{{ \Carbon\Carbon::parse(old('birthday', $user->birthday))->format('d/m/Y') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
                            </div>


                            <!-- Save Button -->
                        <div class="mt-4 md:mt-6 col-span-1 md:col-span-2">
                            <button type="submit" class="bg-customgreen-400 text-white py-2 px-6  rounded-md font-bold hover:bg-customgreen-500">{{ __('messages.Save') }}</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
</section>
