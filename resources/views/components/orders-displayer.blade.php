@php
    // orders are in todo if status is 0,1 or 3, done otherwise
    $todo = $orders->filter(function($order){
        return in_array($order->status, [0,1,3]);
    });
    $done = $orders->filter(function($order){
        return !in_array($order->status, [0,1,3]);
    });
@endphp

<section class="orders-displayer">
    <h2 class="title">To do</h2>
    <ul class="orderList">
        @foreach($todo as $order)
            <x-to-do-order :order="$order"/>
        @endforeach
    </ul>
</section>
<section class="orders-displayer">
    <h2 class="title">Done</h2>
    <ul class="orderList">
        @foreach($done as $order)
            <x-order-done :order="$order"/>
        @endforeach
    </ul>
</section>