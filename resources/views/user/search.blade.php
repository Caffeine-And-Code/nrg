@php
    use Illuminate\Support\Number;
@endphp

    <!DOCTYPE html>
<html lang="{{app()->getLocale()}}" xml:lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{__("main.dashboard")}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    @vite('/resources/css/colors.css')
    @vite('/resources/css/main.css')
    @vite('/resources/css/app.css')
    @vite('/resources/js/themeManager.js')
    @vite('/resources/css/responsive.css')
    @vite('/resources/js/lucky_wheel.js')
    @vite('/resources/css/components/header.css')
    @vite('resources/js/adminJs/footerNavigationManager.js')
    @vite('/resources/css/components/searchBar.css')
    @vite('/resources/css/components/userSearchBar.css')
    @vite("/resources/css/components/ProductDisplayer.css")
    @vite('resources/css/components/footerNavBar.css')
    @vite('resources/js/adminJs/footerNavigationManager.js')
    <link
        rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
    />
</head>
<body class="light">
<x-nav-bar title="Products" />
<main class="w-100 overflow-x-hidden main row min-vh-100 mt-5 container">
    <div class="col-lg-9 col-12 container">
        <section class="row">
            <div class="container mt-3 d-flex flex-column" >
                <h2>{{__("main.search")}}</h2>
                <div class="d-flex"><x-user-search-bar :id="1"/></div>
            </div>
            <div class="m-3 d-flex flex-row gap-2 types-container">
                <form >
                    <input type="hidden" name="search" value="{{$search}}">
                    <button class="btn @if ($productType === null) active @endif">{{__("main.all")}}</button>
                </form>
                @foreach ($productTypes as $type)
                    <form>
                        <input type="hidden" name="search" value="{{$search}}">
                        <input type="hidden" name="product_type" value="{{$type->getId()}}">
                        <button class="btn @if (intval($productType) === $type->getId()) active @endif">{{$type->getName()}}</button>
                    </form>
                @endforeach
            </div>
            <hr class="dividerSearch" />
            <div class="m-3">
                <ul class="search-container fullHeight">
                    @foreach($products as $product)
                        <x-product-search-card :product="$product" hasScore="true"/>
                    @endforeach
                </ul>
            </div>

            <div class="d-block d-lg-none">
                <x-checkout-offcanvas-button :checkout="$checkout"/>
            </div>
        </section>
    </div>
    <div class="d-none d-lg-block col-lg-3">
        <aside class="checkoutAside">
            <x-checkout :checkout="$checkout" />
        </aside>
    </div>
</main>
<x-navigation-footer mode="client"/>
</body>
</html>
