<nav class="d-flex flex-row justify-content-between">
    <img class="navbar-logo" src="{{Vite::asset('resources/imgs/LIGHT/minimalLogo.png')}}" alt="{{__("main.nrg_logo_alt")}}">
    <div class="d-none d-md-flex flex-row align-items-center justify-content-center gap-2">
        <div class="fullHeight d-flex justify-content-center"><h1>{{__($currentPage)}}</h1></div>
        <a href="{{route("user.home")}}" class="btn navbar-icon @if ($currentPage == "main.products") active @endif"><i class="bi bi-backpack"></i></a>
        <a href="{{route("user.profile")}}" class="btn navbar-icon @if ($currentPage != "main.products") active @endif"><i class="bi bi-person"></i></a>
    </div>
</nav>
