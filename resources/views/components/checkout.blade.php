@php
    $randomNumber = rand(0, 10000);
@endphp

<div class="container mt-3">
    <h2>{{__("main.checkout")}}</h2>
    <ul class="search-container">
        @forelse($checkout["products"] as $product)
            <li>
                <x-product-search-card :product="$product" :isCart="true"/>
            </li>
        @empty
            <li class="noProductInCart">
                <p>{{__("main.no_products")}}</p>
            </li>
        @endforelse
    </ul>
    <div class="row border-bottom">
        <span class="col-6">{{__("main.subtotal")}}</span><span class="col-6">{{Number::currency($checkout["total"] + $checkout["discount"] - $checkout["shippingCost"])}}</span>
        <span class="col-6">{{__("main.shipping")}}</span><span class="col-6">{{Number::currency($checkout["shippingCost"])}}</span>
        <span class="col-6">{{__("main.discount")}}</span><span class="col-6">{{Number::currency($checkout["discount"])}}</span>
    </div>
    <div class="row">
        <span class="col-6">{{__("main.total")}}</span><span class="col-6">{{Number::currency($checkout["total"])}}</span>
    </div>
    <article class="mt-5">
        <h2>{{__("main.cart_detail")}}</h2>
        <form class="d-flex flex-column gap-2" action="{{route("user.post_checkout")}}" method="POST">
            @csrf
            <span>{{__("main.min_delivery_time")}}</span>
            <label class="d-none" for={{ "delivery_time".$randomNumber }} >{{__("main.delivery_time")}}</label>
            <input class="customInput small form-control" type="datetime-local" name="delivery_time" id={{ "delivery_time".$randomNumber }} min="{{ now()->addMinutes(15)->format('Y-m-d\TH:i') }}" required />
            <label class="d-none" for={{ "classroom_id".$randomNumber }} >{{__("main.classroom_id")}}</label>
            <select class="noMarginLeftInput form-control customInput small" name="classroom_id" id={{ "classroom_id".$randomNumber }} required >
                <option value="" selected>{{ __("main.choose_classroom") }}</option>
                @foreach($checkout["classrooms"] as $classroom)
                    <option value="{{$classroom->getId()}}">{{$classroom->getName()}}</option>
                @endforeach
            </select>
            <div class="errorBox">
                @if(!$errors->isEmpty())
                    <p>{{ __($errors->first()) }}</p>
                @endif
            </div>
            <button class="form-control customButton"><i class="bi bi-credit-card-2-back m-2"></i>{{__("main.pay")}}</button>
        </form>
    </article>
</div>
