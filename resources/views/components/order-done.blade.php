<li class="to-do-order">
    <figure class="to-do-order-header"><x-order-image-displayer :status="$order->status" />
        <figcaption>
            <h3 class="normalTextBold">{{ $order->delivery_time }}</h3>
            <h5 class="normalTextRegular">{{ __("messages.Client") ." ". $order->user->username }}</h5>
            <h5 class="normalTextRegular">{{ __("messages.Total") ." ". $order->total }} €</h5>
        </figcaption>
    </figure>
    <hr class="icon"/>
</li>