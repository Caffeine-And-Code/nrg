@php
    use Illuminate\Support\Number;
@endphp

<!DOCTYPE html>
<html lang="en">
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
</head>
<body class="light">
    <x-nav-bar title="Products" />
    <x-user-dashboard-mobile :products="$products" :news="$news"/>
    <main class="w-100 overflow-x-hidden desktop">
        <section class="row h-100">
            <x-news-carosel :news="$news" />
            <section class="col-12 col-md-8">
                
                <section class="mt-5 row">
                    <article class="px-5 order-2 order-xl-0 col-12 col-xl-6">
                        <h1>{{__("main.bestseller")}}</h1>
                    <article class="d-flex">
                        <x-user-search-bar />
                    </article>

                        
                        <ul class="search-container">
                            @foreach($products as $product)
                                    <x-product-search-card :product="$product"/>
                            @endforeach
                        </ul>
                    </article>
                    <article class="px-5 container order-0 order-xl-2 col-12 col-xl-6">
                        <h1>{{__("main.daily_spin")}}</h1>

                        <fieldset class="ui-wheel-of-fortune">
                            <ul>
                                <li>$1000</li>
                                <li>$2000</li>
                                <li>$3000</li>
                                <li>$4000</li>
                                <li>$5000</li>
                                <li>$6000</li>
                                <li>$7000</li>
                                <li>$8000</li>
                                <li>$9000</li>
                                <li>$10000</li>
                                <li>$11000</li>
                                <li>$12000</li>
                            </ul>
                            <button type="button">SPIN</button>
                        </fieldset>
                    </article>
                </section>
            </section>
            
            <x-checkout-offcanvas-button :checkout="$checkout"/>
        </section>
        <aside class="d-none d-md-block col-md-4 mt-3 checkoutAside">
            <x-checkout :checkout="$checkout" />
        </aside>
    </main>
    <x-navigation-footer mode="client"/>
</body>
</html>
