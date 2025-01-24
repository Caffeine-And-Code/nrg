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
<header class="nav-bar desktop">
    <img src="" alt="logo" class="logo " id="minimalLogo" />
    <aside class="navigationDesktop">
        <ul class="footerIconList">
            
        <li class="navTitleContainer">
            <h1 class="title navTitle fullWidth">{{ Route::is('admin.dashboard') ? __("messages.Orders") : __("messages.Settings") }}</h1>
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
    <img src="" alt="logo" class="logo " id="minimalLogo" />
    <figure>
        @if($title == "Orders" || $title == "Products")
            <i class="las la-shopping-bag"></i>
        @else
            <i class="las la-cog"></i>
        @endif
        <figcaption class="title navTitle">{{ __("messages.".$title) }}</figcaption>
    </figure>
</header>
