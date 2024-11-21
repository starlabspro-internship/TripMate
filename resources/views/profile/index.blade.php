<x-app-layout>
    <div class="min-h-screen bg-gradient-to-tr from-sky-500 to-orange-400">
    <div class="flex justify-center  ">
        <div class="bg-white/10 backdrop-blur-md border border-white/50 rounded-xl shadow-lg overflow-hidden w-full mt-28 mb-14"  id="container">

            <!-- Header Section -->
            <div class="relative flex justify-center pt-8 ">

                <img class=" border-2 border-[#76A8B2] -bottom-10 left-8 w-40 h-40 rounded-full "
                @if(auth()->user()->image)
                    <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="User Image">
                @else
                    <img src="{{ asset('https://eu.ui-avatars.com/api/' . auth()->user()->name  . '+' . auth()->user()->lastname . 'size=250') }}" alt="Default Image">
                @endif
            </div>

            <!-- Profile Info -->
           
            <div class="p-6 pt-3">
                <div class="flex justify-center text-center text-[#E0FFFF]">
                    <div>
                        <h2 class="text-2xl font-bold flex items-center justify-center">
                            @if($user->verification_status === 'verified')
                                <span class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 text-orange" viewBox="0 0 24 24">
                                        <path d="M12 0a12 12 0 1 0 12 12A12 12 0 0 0 12 0zm-1.7 18.3l-4.6-4.6 1.4-1.4 3.2 3.2 7.2-7.2 1.4 1.4z"/>
                                    </svg>
                                </span>
                            @endif
                            {{ auth()->user()->name }} {{ auth()->user()->lastname }}
                        </h2>
                        <p>{{ auth()->user()->city }}</p>
                    </div>
                </div>
                
                
                <div class="flex justify-between py-4 mx-10 text-[#E0FFFF]">
                    <div class="w-1/3 text-center">
                        <h2 class="text-2xl font-bold">12</h2>
                        <h1>Rides</h1>
                    </div>
                    <div class="w-1/3 text-center">
                        <h2 class="text-2xl font-bold">10</h2>
                        <h1>Reviews</h1>
                    </div>
                    <div class="w-1/3 text-center">
                        <h2 class="text-2xl font-bold">7</h2>
                        <h1>Friends</h1>
                    </div>
                </div>
            </div>



            <a href="{{ route('profile.verify-user') }}" 
            class="w-full sm:w-1/2 bg-gray/20 backdrop-blur-md border-2 border-[#A2D5F2] rounded-lg p-4 my-2 sm:my-0 mb-4 sm:mb-0 mx-2 flex items-center justify-between shadow-sm hover:shadow-xl cursor-pointer hover:scale-105 transition duration-300 hover:border-sky-500">
             <div>
                 <h4 class="font-medium">Verify Profile</h4>
                 <p class="text-sm text-gray-500">You should verify profile for safety reasons.</p>
             </div>
             <span class="text-gray-500 text-lg">&#8594;</span>
         </a>
         

            
                <!-- Ride History Card -->
                <div class="w-full sm:w-1/2 bg-gray/20 backdrop-blur-md border-2 border-[#A2D5F2] rounded-lg p-4 my-2 sm:my-0 mb-4 sm:mb-0 mx-2 flex items-center justify-between shadow-sm hover:shadow-xl cursor-pointer hover:scale-105 transition duration-300 hover:border-sky-500">
                    <div>
                        <h4 class="font-medium">Ride History</h4>
                        <p class="text-sm text-gray-500">See your last rides and details.</p>
                    </div>
                    <span class="text-gray-500 text-lg">&#8594;</span>
                </div>
            </div>
            </div>
            

    
   
     
    
    

</x-app-layout>
