<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<div class="bg-#E0FFFF absolute top-0 left-0 bg-gradient-to-b from-green-900 via-green-900 to-blue-800 bottom-0 leading-5 h-full w-full overflow-hidden"></div>

<div class="relative min-h-screen sm:flex sm:flex-row justify-center bg-transparent rounded-3xl shadow-xl">
    <div class="flex-col flex self-center lg:px-14 sm:max-w-4xl xl:max-w-md z-10" style="transform: translateY(-40px);"> 
        <div class="self-start hidden lg:flex flex-col text-gray-300">
            <h1 class="my-3 font-semibold font-sans text-4xl">Create your account</h1>
            <p class="pr-3 text-sm opacity-75">Join us on this journey with TripMate!</p>
        </div>
    </div>
    <div class="flex justify-center self-center z-10">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="p-12 bg-white mx-auto rounded-3xl mt-8" style="width: 500px;">
            @csrf
            <div class="mb-7 font-sans">
                <h3 class="text-2xl text-gray-800 mb-2">Sign Up</h3> 
                <p class="text-gray-400">Already have an account? <a href="{{ route('login') }}" class="text-sm text-blue-900 hover:text-blue-900">Sign In</a></p>
            </div>            
            <div class="space-y-6 font-sans">
<div class="mb-5">
    <label for="image" class="block mb-2 text-sm font-medium text-gray-700">Profile Picture</label>
    <div class="flex items-center">
        <input id="image" 
               class="hidden" 
               type="file" name="image" accept="image/*" required 
               onchange="updateFileName(this)" />
        <label for="image" class="cursor-pointer flex items-center justify-center w-32 h-10 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300">
            <span class="text-sm">Choose File</span>
        </label>
        <span id="file-name" class="ml-3 text-gray-500 text-sm"></span>
    </div>
    @error('image')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
<div class="flex space-x-4">
    <div class="w-1/2">
        <input id="name" class="w-full text-sm px-4 py-3 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none" type="text" name="name" placeholder="First Name" :value="old('name')" required autofocus />
        @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="w-1/2">
        <input id="lastname" class="w-full text-sm px-4 py-3 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none" type="text" name="lastname" placeholder="Last Name" :value="old('lastname')" required />
        @error('lastname')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
                
                <!-- email -->
                <div>
                    <input id="email" class="w-full text-sm px-4 py-3 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none" type="email" name="email" placeholder="Email" :value="old('email')" required />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                 <!-- Birthday and City Row -->
<div class="flex space-x-4 mt-4">
    <div class="w-1/2">
        <input id="birthday" class="w-full text-sm px-4 py-3 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none" type="date" name="birthday" :value="old('birthday')" required />
        @error('birthday')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="w-1/2">
        <input id="city" class="w-full text-sm px-4 py-3 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none" type="text" name="city" placeholder="City" :value="old('city')" required />
        @error('city')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
                <!-- phone number -->
                <div>
                    <input id="phone" class="w-full text-sm px-4 py-3 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none" type="text" name="phone" placeholder="Phone Number" :value="old('phone')" required />
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                               
<!-- Password and Confirm Password Row -->
<div class="flex space-x-4 mt-4">
    <div class="w-1/2">
        <input id="password" class="w-full text-sm px-4 py-3 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none" type="password" name="password" placeholder="Password" required />
        @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="w-1/2">
        <input id="password_confirmation" class="w-full text-sm px-4 py-3 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none" type="password" name="password_confirmation" placeholder="Confirm Password" required />
    </div>
</div>
                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="mx-auto px-16 flex items-center justify-center mb-6 border border-gray-300 hover:border-gray-900 hover:bg-blue-800 text-gray-700 hover:text-white text-base py-2 rounded-lg tracking-wide font-medium cursor-pointer transition ease-in duration-500">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function updateFileName(input) {
        const fileName = input.files[0] ? input.files[0].name : 'No file chosen';
        document.getElementById('file-name').textContent = fileName;
    }
</script>
<svg class="absolute bottom-0 left-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#fff" fill-opacity="1" d="M0,0L40,42.7C80,85,160,171,240,197.3C320,224,400,192,480,154.7C560,117,640,75,720,74.7C800,75,880,117,960,154.7C1040,192,1120,224,1200,213.3C1280,203,1360,149,1400,122.7L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
</svg>
