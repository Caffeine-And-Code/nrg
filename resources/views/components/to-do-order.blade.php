
@php
    use Carbon\Carbon;

    // Ora attuale
    $now = Carbon::now();

    // Orario di creazione dell'ordine
    $deliveryTime = Carbon::parse($order->created_at);

    // Differenza in minuti
    $diffInMinutes = $now->diffInMinutes($deliveryTime, false); // false per ottenere valori negativi

    if ($diffInMinutes < 0) {
        $diffInMinutes = $diffInMinutes * -1;
    }

    // Formatta la differenza in ore e minuti se necessario
    $timeRemaining = $diffInMinutes > 60
        ? floor($diffInMinutes / 60) . " ".__("messages.hours")." " . $diffInMinutes % 60 . ' '.__("messages.minutes")
        : floor($diffInMinutes) . ' '.__("messages.minutes");
@endphp

<li class="to-do-order">
        <figure class="to-do-order-header row d-flex justify-content-center">
            <x-order-image-displayer :status="$order->status" />
            <figcaption class="col-md-6 col-12">
                <h3 class="normalTextBold">{{ $timeRemaining }}</h3>
                <h4 class="normalTextRegular">{{ __("messages.Order") }} n° {{ $order->number }}</h4>
                <h4 class="normalTextRegular">{{ __("messages.Client") }} {{ $order->user->username }}</h4>
            </figcaption>
        </figure>
        <hr class="icon"/>
        <ul class="to-do-order-body">
            @foreach($order->products as $product)
                <li class="to-do-order-product">
                    <h3 class="normalTextRegular">{{ $product->pivot->quantity }}    {{ $product->name }} </h3>
                </li>
            @endforeach
        </ul>
        
            <div class="to-do-order-footer row">
                <article class="normalTextRegular col-md-6 col-12">
                    <h3 class="normalTextRegular">{{ __("messages.Class") }}: {{ $order->classroom->name }}</h3>
                    <h4 class="normalTextRegular">{{ __("messages.Total") }}: {{ $order->total }} €</h4>
                </article>
                @switch($order->status)
                    @case(1)
                    <form action="{{ route('admin.orders.goDelivery', ["id" => $order->id]) }}" method="post">
                        @csrf
                    <button type="submit" class="btn customButton col-12 col-md-6"><i class="las la-piggy-bank" class="btnIcon"></i> {{ __("messages.Ready") }}</button>
                    </form>    
                    @break
                    @default
                    <form action="{{ route('admin.orders.qrCode', ["id" => $order->id]) }}" method="get">
                        @csrf
                    <button type="submit" class="btn customButton col-12 col-md-6"><i class="las la-parachute-box" class="btnIcon"></i> {{ __("messages.Complete") }}</button>
                </form>
                @endswitch
            </div>
        <hr class="icon"/>
</li>