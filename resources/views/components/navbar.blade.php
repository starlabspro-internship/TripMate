@php
    $links = [
        'Home' => '#',
        'Rides' => '#',
        'My Trips' => '#',
        'Notifications' => '#'
    ];
@endphp

<nav x-data="{ open: false }" class="flex justify-between items-center px-5 py-2 bg-white mx-auto ">
    <img class="h-10" src="{{ Vite::asset('resources/images/tripmate.png') }}" alt="...">
    <div :class="{'h-fit': open, 'h-0': ! open}" class="absolute bg-white top-14 overflow-hidden left-0 w-full px-5 md:relative md:h-fit md:top-0">
        <ul class="flex w-full flex-col gap-4 py-4 md:py-0 md:flex-row md:justify-center">
            @foreach ($links as $key => $value)
                <li>
                    <a class="hover:text-gray-500 font-medium" href="{{ $value }}">{{ $key }}</a>
                </li>
            @endforeach
            @if (! Auth::check())
                <li>
                    <a class="hover:text-gray-500 font-medium" href="#">Profile</a>
                </li>
            @else
                <button>Log In</button>
            @endif
        </ul>
    </div>
    <img @click="open = ! open" src="{{ Vite::asset('resources/images/hamburger-icon.svg') }}" class="text-3xl cursor-pointer md:hidden"></img>
</nav>