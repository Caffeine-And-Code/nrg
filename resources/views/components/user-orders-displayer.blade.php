@php
    // orders are in todo if status is 0,1 or 3, done otherwise
    $toDisplay = $orders->filter(function($order){
        return in_array($order->status, [1,3,4]);
    });
@endphp

<section class="container orders-displayer justify-content-center mb-5">
    <h2 class="title desktop-title">{{ __("messages.orders") }}</h2>
    <ul class="user-orders-displayer ">
        @if (collect($toDisplay)->isEmpty())
            <p>{{ __("messages.noOrders") }}</p>
        @endif
        @foreach($toDisplay as $order)
            <x-user-order-card :order="$order"/>
        @endforeach
    </ul>
</section>