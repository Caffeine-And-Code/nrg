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
    @vite('/resources/js/themeManager.js')
    @vite('/resources/js/lucky_wheel.js')
</head>
<body class="light">
    <x-user-nav-bar currentPage="{{$currentPage}}"></x-user-nav-bar>
    <main class="h-100 w-100 overflow-x-hidden">
        <section class="row h-100">
            <section class="col-12 col-md-8">
                <article class="d-flex justify-content-center mt-3">
                    <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner h-100 m-100">
                            @foreach($news as $singleNews)
                                <div class="carousel-item active h-100 m-100">
                                    <img src="{{"{$singleNews->getImagePath()}"}}" class="d-block" alt="news">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </article>
                <section class="mt-5 row">
                    <article class="px-5 order-2 order-xl-0 col-12 col-xl-6">
                        <h1>{{__("main.bestseller")}}</h1>
                        <form class="d-flex justify-content-center gap-2" action="{{route("user.search")}}">
                            <label for="search" class="visually-hidden">{{__("main.search_product")}}</label>
                            <div class="search-input flex-grow-1">
                                <i class="bi bi-search"></i>
                                <input type="search" class="form-control" placeholder="{{__("main.search")}}">
                            </div>
                            <button class="btn navbar-icon active" aria-label="{{__("main.search_product")}}"><i class="bi bi-magic"></i></button>
                        </form>
                        <ul class="search-container">
                            @foreach($products as $product)
                                <li>
                                    <form>
                                        <img src="{{ asset('images/products/' . basename($product->image)) }}" alt="{{__("main.product_image", ["name" => $product->getName()])}}">
                                        <div>
                                            <strong>{{$product->getName()}}</strong>
                                            @if ($product->getPercDiscount() > 0)
                                                <p>
                                                <del>{{Number::currency($product->getPrice())}}</del>
                                                <span>{{Number::currency($product->getDiscountedPrice())}}</span>
                                                </p>
                                            @else
                                                <span>{{Number::currency($product->getDiscountedPrice())}}</span>
                                            @endif
                                        </div>
                                        <button class="btn"><i class="bi bi-cart"></i></button>
                                    </form>
                                </li>
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
            <aside class="d-nome d-md-block col-md-4 h-100 bg-black">
                Aside
            </aside>
        </section>
    </main>
</body>
</html>
