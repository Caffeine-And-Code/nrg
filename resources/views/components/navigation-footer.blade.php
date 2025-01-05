@vite('resources/css/components/footerNavBar.css')
@vite('resources/js/adminJs/footerNavigationManager.js')

@php
    $previousRouteName = null;
    try {
        $previousRouteName = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    } catch (\Exception $e) {
        $previousRouteName = null;
    }
@endphp

@if($mode == 'seller')
<nav class="footerNavigation">
    <ul class="footerIconList">
        <li>
            <a href="{{ route('seller.dashboard') }}" class="{{ Route::is('seller.dashboard') ? 'active' : ("seller.dashboard" == $previousRouteName ? 'oldRoute' : '' ) }}">
                <img src="{{ Vite::asset('resources/imgs/Take_away.png') }}" alt="Dashboard" class="z-3">
            </a>
        </li>
        <li>
            <a href="{{ route('seller.settings') }}" class="{{ Route::is('seller.settings') ? 'active' : ("seller.settings" == $previousRouteName ? 'oldRoute' : '' ) }}">
                <img src="{{ Vite::asset('resources/imgs/Settings.png') }}" alt="Settings" class="z-3">
            </a>
        </li>            
    </ul>
    <!-- Pallino -->
    <div id="dot" class="z-2"></div>
</nav>
@elseif($mode == 'client')
{{-- Code for client mode --}}
@endif
