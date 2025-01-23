@vite('resources/css/components/footerNavBar.css')
@vite('resources/js/adminJs/footerNavigationManager.js') 
@php
    $previousRouteName = null;
    try {
        $previousRouteName = app('router')
            ->getRoutes()
            ->match(app('request')->create(url()->previous()))
            ->getName();
    } catch (\Exception $e) {
        $previousRouteName = null;
    }
@endphp

@if ($mode == 'admin')
<nav class="footerNavigation mobile">
    <ul class="footerIconList">
        <li>
            <a
                href="{{ route('admin.dashboard') }}"
                class="{{ Route::is('admin.dashboard') ? 'active1' : ('admin.dashboard' == $previousRouteName ? 'oldRoute1' : '') }}"
            >
                <img
                    src="{{ Vite::asset('resources/imgs/Take_away.png') }}"
                    alt="Dashboard"
                    class="z-3"
                />
            </a>
        </li>
        <li>
            <a
                href="{{ route('admin.settings') }}"
                class="{{ Route::is('admin.settings') ? 'active1' : ('admin.settings' == $previousRouteName ? 'oldRoute1' : '') }}"
            >
                <img
                    src="{{ Vite::asset('resources/imgs/Settings.png') }}"
                    alt="Settings"
                    class="z-3"
                />
            </a>
        </li>
    </ul>
    <!-- Pallino -->
    <div id="dot1" class="z-2 dot dot1"></div>
</nav>
@elseif($mode == 'client') 
{{-- Code for client mode --}} 
@endif
