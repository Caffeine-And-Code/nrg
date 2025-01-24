<div>
    <div>
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
        <div class="d-flex flex-row align-items-end flex-grow-0 pt-0 mx-3">
            @if(isset($isCart) && $isCart)
                <form method="POST" action="{{route("user.add_product_to_cart", ["product_id" => $product->getId(), "quantity" => $product->getCartUsers()->first()->quantity -1])}}">
                    @csrf
                    <button class="btn position-relative">
                        <i class="bi bi-dash"></i>
                    </button>
                </form>
                <form method="POST" action="{{route("user.add_product_to_cart", ["product_id" => $product->getId(), "quantity" => $product->getCartUsers()->first()->quantity + 1])}}">
                    @csrf
                    <button class="btn position-relative">
                        <i class="bi bi-plus"></i>
                    </button>
                </form>
                <form method="POST" action="{{route("user.add_product_to_cart", ["product_id" => $product->getId(), "quantity" => 0])}}">
                    @csrf
                    <button class="btn position-relative">
                        <i class="bi bi-cart-x"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                            {{$product->getCartUsers()->first()->quantity}}
                                                        <span class="visually-hidden">{{__("main.product_quantity", ["qt" => $product->getCartUsers()->first()->quantity])}}</span>
                                                      </span>
                    </button>
                </form>
            @else
                <form method="POST" action="{{route("user.add_product_to_cart", ["product_id" => $product->getId(), "quantity" => ($product->getCartUsers()->first()?->quantity + 1) ?? 1])}}">
                    @csrf
                    <button class="btn"><i class="bi bi-cart-plus"></i></button>
                </form>
            @endif
        </div>
    </div>
    @if (isset($hasScore) && $hasScore)
        <div class="d-flex flex-column align-items-start h-100">
            <x-rating rating="{{round($product->rating)}}" />
            <p>{{$product->getDescription()}}</p>
        </div>
    @endif
</div>
