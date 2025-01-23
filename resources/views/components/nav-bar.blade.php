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
    <img src="" alt="logo" class="logo minimalLogo" id="" />
    <aside class="navigationDesktop">
        <ul class="footerIconList">
            
        <li class="navTitleContainer">
            <h1 class="title navTitle fullWidth">{{ Route::is('admin.dashboard') ? "Ordini" : "Impostazioni" }}</h1>
        </li>
            <li>
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="{{ Route::is('admin.dashboard') ? 'active2' : ('admin.dashboard' == $previousRouteName ? 'oldRoute2' : '') }}"
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
                    class="{{ Route::is('admin.settings') ? 'active2' : ('admin.settings' == $previousRouteName ? 'oldRoute2' : '') }}"
                >
                    <img
                        src="{{ Vite::asset('resources/imgs/Settings.png') }}"
                        alt="Settings"
                        class="z-3"
                    />
                </a>
            </li>
        </ul>
    </aside>
    <div class="z-99 dot dot2" id="dot2"></div>
</header>
<header class="nav-bar mobile">
    <img src="" alt="logo" class="logo minimalLogo" id="" />
    <figure>
        <img src="{{Vite::asset($imagePath)}}" alt="pageImage" />
        <figcaption translate="{{$title}}" class="title navTitle"></figcaption>
    </figure>
</header>
