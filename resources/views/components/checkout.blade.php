<section class="container">
<h1>{{__("main.checkout")}}</h1>
<section>
    <ul class="search-container">
        @foreach($checkout["products"] as $product)
            <li>
                <x-product-search-card :product="$product" :isCart="true"/>
            </li>
        @endforeach
    </ul>
</section>
<section>
    <article class="row border-bottom">
        <span class="col-6">{{__("main.subtotal")}}</span><span class="col-6">{{Number::currency($checkout["total"] - $checkout["shippingCost"])}}</span>
        <span class="col-6">{{__("main.shipping")}}</span><span class="col-6">{{Number::currency($checkout["shippingCost"])}}</span>
        <span class="col-6">{{__("main.discount")}}</span><span class="col-6">{{Number::currency($checkout["discount"])}}</span>
    </article>
    <article class="row">
        <span class="col-6">{{__("main.total")}}</span><span class="col-6">{{Number::currency($checkout["total"])}}</span>
    </article>
</section>
</section>
