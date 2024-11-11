@guest
<x-app-layout>
    <x-banner
        title="Welcome to Our Platform"
        description="Discover new experiences with us."
        button-text="Learn More"
        button-link="/about"
    />
    @include('components.statistic-box')
    @include('components.end-section')
    <x-cars />
    <x-partners />
    <x-icons />
    <x-contact />
   
</x-app-layout>
@if (!Auth::check() && request()->is('/'))
<x-footer />
@endif
@endguest
