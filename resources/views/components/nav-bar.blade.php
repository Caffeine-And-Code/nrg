@vite('/resources/css/components/header.css')
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
@if (Auth::guard("admin")->check())
<header class="nav-bar desktop">
    <img src="" alt="logo" class="logo " id="minimalLogo" />
    <aside class="navigationDesktop">
        <ul class="d-flex flex-row justify-content-end gap-5 align-items-center h-100 my-0 p-3">

        <li class="navTitleContainer">
            <h2 class="title navTitle">{{ Route::is('admin.dashboard') ? __("messages.Orders") : __("messages.Settings") }}</h2>
        </li>
            <li>
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="{{ Route::is('admin.dashboard') ? 'active2' : ('admin.dashboard' == $previousRouteName ? 'oldRoute2' : '') }} navigationLink"
                >

                    <i class="las la-shopping-bag navigationIcons z-3"></i>
                </a>
            </li>
            <li>
                <a
                    href="{{ route('admin.settings') }}"
                    class="{{ Route::is('admin.settings') ? 'active2' : ('admin.settings' == $previousRouteName ? 'oldRoute2' : '') }} navigationLink"
                >
                <i class="las la-cog navigationIcons z-3"></i>
                </a>
            </li>
        </ul>
    </aside>
    <div class="z-99 dot dot2" id="dot2"></div>
</header>
<header class="nav-bar mobile">
    <img src="" alt="logo" class="logo " id="minimalLogo_" />
    <figure>
        @if($title == "Orders" || $title == "Products")
            <i class="las la-shopping-bag"></i>
        @else
            <i class="las la-cog"></i>
        @endif
        <figcaption class="title navTitle">{{ __("messages.".$title) }}</figcaption>
    </figure>
</header>
@else
<header class="nav-bar desktop">
    <img src="" alt="logo" class="logo " id="minimalLogo_" />
    <aside class="navigationDesktop">
        <ul class="footerIconList">

        <li class="navTitleContainer">
            <h2 class="title navTitle fullWidth">{{ Route::is('admin.dashboard') ? __("messages.Orders") : __("messages.Settings") }}</h2>
        </li>
            <li>
                <a
                    href="{{ route('user.home') }}"
                    class="{{ Route::is('user.home') ? 'active2' : ('user.home' == $previousRouteName ? 'oldRoute2' : '') }} navigationLink"
                >

                    <i class="las la-shopping-bag navigationIcons z-3"></i>
                </a>
            </li>
            <li>
                <a
                    href="{{ route('user.profile') }}"
                    class="{{ Route::is('user.profile') ? 'active2' : ('user.profile' == $previousRouteName ? 'oldRoute2' : '') }} navigationLink"
                >
                <i class="las la-id-card navigationIcons z-3"></i>
                </a>
            </li>
        </ul>
    </aside>
    <div class="z-99 dot dot2" id="dot2"></div>
</header>
<header class="nav-bar mobile">
    <img src="" alt="logo" class="logo " id="minimalLogo" />
    <figure>
        @if($title == "Orders" || $title == "Products")
            <i class="las la-shopping-bag"></i>
        @elseif($title == "Account")
        <i class="las la-user"></i>
        @else
        <i class="las la-id-card"></i>
        @endif
        <figcaption class="title navTitle">{{ __("messages.".$title) }}</figcaption>
    </figure>
</header>
@endif
