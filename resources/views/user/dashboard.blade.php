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
    @vite('/resources/js/lucky_wheel.js')
    @vite('/resources/css/components/header.css')
    @vite('resources/js/adminJs/footerNavigationManager.js')
    @vite('/resources/css/components/searchBar.css')
    @vite('/resources/css/components/userSearchBar.css')
    @vite("/resources/css/components/ProductDisplayer.css")
    @vite('resources/css/components/footerNavBar.css')
    @vite('resources/js/adminJs/footerNavigationManager.js')
    @vite('/resources/css/responsive.css')
    @vite("/resources/css/components/carousel.css")
    @vite("/resources/js/carousel.js")
    <link
        rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
    />
</head>
<body class="light">
    <x-nav-bar title="Products" />
    <main>

    <div class="w-100 overflow-x-hidden main row">
        <div class="col-lg-9">
            <div class="container">
            <div class="row mt-5">
                <section class="col-12">
                    <h2>{{__("main.news")}}</h2>
                    <x-news-carosel :news="$news" />
                </section>
                <div class="col-12">
                    <div class="mt-5 row">
                        <section class="order-2 order-xl-0 col-12 col-xl-6">
                            <h2>{{__("main.bestseller")}}</h2>
                            <div class="d-flex">
                                <x-user-search-bar :id="1"/>
                            </div>
                            <ul class="search-container">
                                @foreach($products as $product)
                                    <x-product-search-card :product="$product"/>
                                @endforeach
                            </ul>
                        </section>
                        @if ($spinWheel)
                            <section class="px-5 container order-0 order-xl-2 col-12 col-xl-6">
                                <h2>{{__("main.daily_spin")}}</h2>

                                <div class="wheel-article mb-5 d-flex flex-column justify-content-center gap-2">
                                    <fieldset class="ui-wheel-of-fortune h-100">
                                        <ul>
                                            <li data-id="0" data-text="nullo">{{__("main.null_win")}}</li>
                                            @foreach($spinValues as $value)
                                                <li data-id="{{$value->getId()}}" data-text="{{$value->getText()}}">{{$value->getText()}}</li>
                                            @endforeach
                                        </ul>
                                    </fieldset>
                                    <input type="hidden" name="spin-value" id="spin-value" value="{{$spinValue}}">
                                    <button class="customButton" id="spin-btn">{{__("main.run_lucky_wheel")}}</button>
                                    <p class="spin-result" ></p>
                                </div>
                            </section>
                        @elseif(isset($wheel_last_win))
                            <section class="container order-0 order-xl-2 col-12 col-xl-6">
                                <h2>{{__("main.daily_spin")}}</h2>
                                @if ($wheel_last_win == "null_win_reserved_field_immutable_1237871263")
                                    <p>{!! __("main.wheel_fail") !!}</p>
                                @else
                                    <p>{!! __("main.wheel_win", ["win" => $wheel_last_win]) !!}</p>
                                @endif
                            </section>
                        @endif

                    </div>
                </div>

                <div class="d-block d-lg-none">
                    <x-checkout-offcanvas-button :checkout="$checkout"/>
                </div>
            </div>
        </div>
        </div>
        <div class="d-none d-lg-block col-lg-3">
            <aside class="checkoutAside">
                <x-checkout :checkout="$checkout" />
            </aside>
        </div>
    </div>
    </main>
    <x-navigation-footer mode="client"/>
</body>
</html>
