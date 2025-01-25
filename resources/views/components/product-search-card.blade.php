@vite("/resources/css/components/ProductDisplayer.css")

@php
    $user = Auth::user();
    $isInCart = $product->getCartUsers()->where("pivot.user_id", $user->getId())->count();
    $isCart = $isInCart > 0;
@endphp

<li class="mb-3 p-2">
    <section>
        <figure>
            <img class="productImage" src="{{ asset('images/products/' . basename($product->image)) }}" alt="{{__("main.product_image", ["name" => $product->getName()])}}">
        
            <figcaption class="productText">
                <strong class="normalTextRegular">{{$product->getName()}}</strong>
            @if ($product->getPercDiscount() > 0)
                <p class="normalTextRegular">
                    <del>{{Number::currency($product->getPrice())}}</del>
                    <span>{{Number::currency($product->getDiscountedPrice())}}</span>
                </p>
            @else
                <span class="normalTextRegular">{{Number::currency($product->getDiscountedPrice())}}</span>
            @endif
            </figcaption>
        </figure>
        <article class="productCartActions">
            @if(isset($isCart) && $isCart)
                <form method="POST" action="{{route("user.add_product_to_cart", ["product_id" => $product->getId(), "quantity" => $product->getCartUsers()->first()->quantity -1])}}">
                    @csrf
                    <button class="btn position-relative">
                        <i class="bi bi-dash  icon"></i>
                    </button>
                </form>
                <form method="POST" action="{{route("user.add_product_to_cart", ["product_id" => $product->getId(), "quantity" => $product->getCartUsers()->first()->quantity + 1])}}">
                    @csrf
                    <button class="btn position-relative">
                        <i class="bi bi-plus icon"></i>
                    </button>
                </form>
                <form method="POST" action="{{route("user.add_product_to_cart", ["product_id" => $product->getId(), "quantity" => 0])}}">
                    @csrf
                    <button class="btn position-relative">
                        <i class="bi bi-cart-x icon"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                            {{$product->getCartUsers()->first()->quantity}}
                                                        <span class="visually-hidden">{{__("main.product_quantity", ["qt" => $product->getCartUsers()->first()->quantity])}}</span>
                                                      </span>
                    </button>
                </form>
            @else
                <form method="POST" action="{{route("user.add_product_to_cart", ["product_id" => $product->getId(), "quantity" => ($product->getCartUsers()->first()?->quantity + 1) ?? 1])}}">
                    @csrf
                    <button class="btn"><i class="bi bi-cart-plus icon"></i></button>
                </form>
            @endif
        </article>
    </section>
        @if ($product->rating > 0)
        <div class="d-flex flex-column align-items-start h-100 justify-content-start">
            <x-rating rating="{{round($product->rating)}}" />
            <p>{{$product->getDescription()}}</p>
        </div>
        @endif
</li>
