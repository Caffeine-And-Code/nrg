<section class="container">
<h1>{{__("main.checkout")}}</h1>
    <ul class="search-container">
        @foreach($checkout["products"] as $product)
            <li>
                <x-product-search-card :product="$product" :isCart="true"/>
            </li>
        @endforeach
    </ul>
    <div class="row border-bottom">
        <span class="col-6">{{__("main.subtotal")}}</span><span class="col-6">{{Number::currency($checkout["total"] - $checkout["shippingCost"])}}</span>
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
            <input class="customInput small form-control" type="datetime-local" name="delivery_time" min="{{ now()->addMinutes(15)->format('Y-m-d\TH:i') }}" required />
            <select class="noMarginLeftInput form-control customInput small" name="classroom_id" required >
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
</section>
