@guest
<x-app-layout>
    <x-banner
        title="Welcome to Our Platform"
        description="Discover new experiences with us."
        button-text="Learn More"
        button-link="/about"
    />
    @include('components.statistic-box')
    <x-cars />
    <x-partners />
    <x-icons />
</x-app-layout>
@if (!Auth::check() && request()->is('/'))
<x-footer />
@endif
@endguest
