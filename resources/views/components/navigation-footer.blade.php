@php
    $previousRouteName = null;
    try {
        $previousRouteName = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    } catch (\Exception $e) {
        $previousRouteName = null;
    }
@endphp

@vite('resources/js/adminJs/footerNavigationManager.js')

@if($mode == 'admin')
<nav class="footerNavigation">
    <ul class="footerIconList">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="{{ Route::is('admin.dashboard') ? 'active' : ("admin.dashboard" == $previousRouteName ? 'oldRoute' : '' ) }}">
                <img src="{{ Vite::asset('resources/imgs/Take_away.png') }}" alt="Dashboard">
            </a>
        </li>
        <li>
            <a href="{{ route('admin.settings') }}" class="{{ Route::is('admin.settings') ? 'active' : ("admin.settings" == $previousRouteName ? 'oldRoute' : '' ) }}">
                <img src="{{ Vite::asset('resources/imgs/Settings.png') }}" alt="Settings">
            </a>
        </li>            
    </ul>
</nav>
@elseif($mode == 'client')
{{-- Code for client mode --}}
@endif

<!-- Pallino -->
<div id="dot"></div>