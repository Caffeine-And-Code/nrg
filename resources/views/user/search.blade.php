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
<main class="w-100 overflow-x-hidden">
    <section class="row h-100">
        <section class="col-12 col-md-8">
            <div class="container">
                <article>
                    <form class="d-flex m-3 justify-content-center gap-2" action="{{route("user.search")}}">
                        <label for="search" class="visually-hidden">{{__("main.search_product")}}</label>
                        <div class="search-input flex-grow-1">
                            <i class="bi bi-search"></i>
                            <input type="search" name="search" class="form-control" placeholder="{{__("main.search")}}" value="{{$search}}">
                            <input type="hidden" name="product_type" value="{{$productType}}">
                        </div>
                        <button class="btn navbar-icon active" aria-label="{{__("main.search_product")}}"><i class="bi bi-magic"></i></button>
                    </form>
                </article>
                <article class="m-3 d-flex flex-row gap-2 types-container">
                    <form>
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
                </article>
                <article class="m-3">
                    <ul class="search-container">
                        @foreach($products as $product)
                            <li>
                                <x-product-search-card :product="$product" hasScore="true"/>
                            </li>
                        @endforeach
                    </ul>
                </article>
            </div>
        </section>
        <aside class="d-none d-md-block col-md-4 mt-3">
            <x-checkout :checkout="$checkout" />
        </aside>
    </section>
</main>
</body>
</html>
