<x-app-layout>
    <div class="flex flex-col border ring-4 ring-customgreen-300 bg-customgreen-100 border-customgreen-300 m-[30px] md:mx-[200px] p-6 rounded-xl shadow-2xl">
        <h1 class="text-3xl font-extrabold text-center text-customgreen-500 mb-4">{{ ('messages.User Status') }}</h1>
        <div class="mt-4 flex justify-center items-center">
            <img
                src="{{ $user->image }}"
                alt="Profile picture of {{ $user->name }}"
                class="w-[230px] h-[230px] shadow-2xl rounded-full border-4 border-gray-300"
            />
        </div>
        <div class="mt-6 flex flex-col items-center space-y-4">
            <h2 class="text-lg text-gray-800 font-semibold">
                <b>{{ ('messages.Name:') }}</b><span class="capitalize"> {{ $user->name }} {{$user->lastname}} </span>
                @if ($user->verification_status === 'verified')
                    <svg xmlns="http://www.w3.org/2000/svg" fill="green"
                        class="w-5 h-5 text-green-500 inline ml-2" viewBox="0 0 24 24">
                        <path
                            d="M12 0a12 12 0 1 0 12 12A12 12 0 0 0 12 0zm-1.7 18.3l-4.6-4.6 1.4-1.4 3.2 3.2 7.2-7.2 1.4 1.4z"/>
                    </svg>
                @endif
            </h2>
            <div class="">
                <h3 class="text-md text-gray-700"><b>Email:</b> {{ $user->email }}</h3>
                <h3 class="text-md text-gray-700"><b>{{ ('messages.Phone:') }}</b> {{ $user->phone }}</h3>
                <h3 class="text-md text-gray-700"><b>{{ ('messages.City:') }}</b><span class="capitalize"> {{ $user->city }} </span></h3>
                <h3 class="text-md text-gray-700"><b>{{ __('messages.Gender:') }}</b><span class="capitalize"> {{ $user->gender }} </span></h3>
            </div>
        </div>
    </div>
</x-app-layout>