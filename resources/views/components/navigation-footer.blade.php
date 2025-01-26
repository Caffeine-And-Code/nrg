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
                class="{{ Route::is('admin.dashboard') ? 'active1' : ('admin.dashboard' == $previousRouteName ? 'oldRoute1' : '') }} navigationLink"
                title="Dashboard"
                >

            <i class="las la-shopping-bag navigationIcons z-3"></i>
            </a>
        </li>
        <li>
            <a
                href="{{ route('admin.settings') }}"
                class="{{ Route::is('admin.settings') ? 'active1' : ('admin.settings' == $previousRouteName ? 'oldRoute1' : '') }} navigationLink"
                title="Settings"
            >
            <i class="las la-cog navigationIcons z-3"></i>
            </a>
        </li>
    </ul>
    <!-- Pallino -->
    <div id="dot1" class="z-2 dot dot1"></div>
</nav>
@else
<nav class="footerNavigation mobile">
    <ul class="footerIconList">
        <li>
            <a
                href="{{ route('user.home') }}"
                class="{{ Route::is('user.home') ? 'active1' : ('user.home' == $previousRouteName ? 'oldRoute1' : '') }} navigationLink"
                title="Dashboard"
                >

            <i class="las la-shopping-bag navigationIcons z-3"></i>
            </a>
        </li>
        <li>
            <a
                href="{{ route('user.checkout') }}"
                class="{{ Route::is('user.checkout') ? 'active1' : ('user.checkout' == $previousRouteName ? 'oldRoute1' : '') }} navigationLink"
                title="Checkout"
            >
            <i class="las la-shopping-cart navigationIcons z-3"></i>
            </a>
        </li>
        <li>
            <a
                href="{{ route('user.profile') }}"
                class="{{ Route::is('user.profile') ? 'active1' : ('user.profile' == $previousRouteName ? 'oldRoute1' : '') }} navigationLink"
                title="Profile"
            >
            <i class="las la-id-card navigationIcons z-3"></i>
            </a>
        </li>
    </ul>
    <!-- Pallino -->
    <div id="dot1" class="z-2 dot dot1"></div>
</nav>
@endif
