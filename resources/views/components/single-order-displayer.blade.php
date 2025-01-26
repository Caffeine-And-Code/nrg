<div class="w-100 container">
    <section>
        <h2 class="title shadowText">
            {{ __("messages.Order") }} n° {{ $order->getNumber() }}
        </h2>
    </section>
    <ul>
        @foreach($order->products as $product)
        <li>
            <article class="d-flex flex-column">
            <figure class="d-flex">
                <img class="productImage" src="{{ asset('images/products/' .
                basename($product->image)) }}" alt="{{__("main.product_image",
                ["name" => $product->getName()])}}">

                <figcaption class="productText d-flex">
                    <h3><strong class="normalTextRegular">
                        {{$product->getName()}}
                    </strong></h3>
                    @if ($product->getPercDiscount() > 0)
                    <p class="normalTextRegular">
                        <del>{{Number::currency($product->getPrice())}}</del>
                        <span>
                            @if ($product->pivot->quantity > 1)
                            {{Number::currency($product->getDiscountedPrice())}} x {{$product->pivot->quantity}} = {{Number::currency($product->getDiscountedPrice() * $product->pivot->quantity)}}
                            @else
                            {{Number::currency($product->getDiscountedPrice())}}
                            @endif
                        </span>
                    </p>
                    @else
                    <span class="normalTextRegular">
                        @if ($product->pivot->quantity > 1)
                        {{Number::currency($product->getDiscountedPrice())}} x {{$product->pivot->quantity}} = {{Number::currency($product->getDiscountedPrice() * $product->pivot->quantity)}} €
                        @else
                        {{Number::currency($product->getDiscountedPrice())}}
                        @endif
                    </span>
                    @endif

                </figcaption>
            </figure>
                @if ($order->getStatus() == \App\Models\Order::STATUS_DONE)
                    @if($product->ratings->count() <= 0)
                    <article>
                        <h4>{{__("main.write_rating")}}</h4>
                        <div class="d-flex rating-bar">
                            @for ($i = 0; $i < 5; $i++)
                                <form class="pe-auto" action="{{route("user.write_rating")}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input type="hidden" name="rating" value="{{$i+1}}">
                                    <button class="btn"><i class="bi bi-star"></i></button>
                                </form>
                            @endfor
                        </div>
                    </article>
                    @else
                    <article>
                        <h4>{{__("main.write_rating")}}</h4>
                        <div class="d-flex gap-2 rating-bar">
                            @for ($i = 0; $i < 5; $i++)
                                <form class="pe-auto" action="{{route("user.write_rating")}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input type="hidden" name="rating" value="{{$i+1}}">
                                    <button class="btn"><i class="bi @if ($product->ratings->first()->rating >= ($i+1)) bi-star-fill @else bi-star @endif"></i></button>
                                </form>
                            @endfor
                        </div>
                    </article>
                    @endif
                @endif
            </article>
            <hr />
        </li>
        @endforeach
    </ul>

    @php $status = $order->status; switch ($status) { case 0:
    $status = __("messages.Created"); break; case 1: $status =
    __("messages.Payed"); break; case 2: $status = __("messages.Cancelled");
    break; case 3: $status = __("messages.Delivering"); break; default: $status
    = __("messages.Done"); break; } @endphp

    <div class="d-flex flex-column">
        <div class="d-flex flex-row justify-content-between">
            <p class="normalTextBold m-0">{{ __("messages.Discount") }}:</p>
            <p class="normalTextRegular m-0">-{{$order->used_portfolio}} €</p>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <p class="normalTextBold m-0">{{ __("messages.Total") }}:</p>
            <p class="normalTextRegular m-0">{{$order->getTotal()}} €</p>
        </div>
    </div>

    <div class="d-flex flex-column mt-4">
        <div class="d-flex flex-row justify-content-between">
            <p class="normalTextBold m-0">{{ __("messages.MadeOn") }}:</p>
            <p class="normalTextRegular m-0">{{$order->created_at}}</p>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <p class="normalTextBold m-0">{{ __("messages.Classrooms") }}:</p>
            <p class="normalTextRegular m-0">{{$order->classroom->name}}</p>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <p class="normalTextBold m-0">{{ __("messages.Status") }}:</p>
            <p class="normalTextRegular m-0">{{$status}}</p>
        </div>
    </div>

    @php
    $json = json_encode([ 'order_id' => $order->getId(), 'user_id' =>
    $order->getUserId(), ]);
    @endphp
    <input type="hidden" id="order-json" value="{{$json}}" />
    @if ($order->getStatus() == \App\Models\Order::STATUS_DELIVERING)
    <section class="d-flex align-items-center justify-content-evenly flex-column">
        <div id="qrcode" class="pt-5 pb-5"></div>
        <h2 class="title">{{ __("messages.ScanMe") }}</h2>
    </section>
    @endif
    @if ($order->getStatus() == \App\Models\Order::STATUS_DELIVERING)
    <script >
        document.addEventListener('DOMContentLoaded', function () {
            new QRCode(document.getElementById('qrcode'), {
                text: JSON.stringify(
                    JSON.parse(document.getElementById('order-json').value)
                ),
            });
        });
    </script>
        @endif
</div>
