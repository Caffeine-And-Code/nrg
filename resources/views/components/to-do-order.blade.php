@vite('/resources/css/components/toDoOrder.css')
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
        ? floor($diffInMinutes / 60) . ' hours ' . $diffInMinutes % 60 . ' minutes'
        : floor($diffInMinutes) . ' minutes';
@endphp

<li class="to-do-order">
        <figure class="to-do-order-header"><x-order-image-displayer :status="$order->status" />
            <figcaption>
                <h3 class="normalTextBold">{{ $timeRemaining }} ago</h3>
                <h5 class="normalTextRegular">Order n° {{ $order->number }}</h5>
                <h5 class="normalTextRegular">Client {{ $order->user->username }}</h5>
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
        @csrf
        <form action="{{ route('admin.orders.qrCode', ["id" => $order->id]) }}" method="post">
            @csrf
            <section class="to-do-order-footer row">
                <span class="normalTextRegular col-5">
                    <h3 class="normalTextRegular">Class: {{ $order->classroom->name }}</h3>
                    <h3 class="normalTextRegular">Total: {{ $order->total }} €</h3>
                </span>
                @switch($order->status)
                    @case(0)
                        <button type="submit" class="btn customButton col-12 col-md-6"><ion-icon name="fast-food-outline" class="btnIcon"></ion-icon> Ready</button>
                        @break
                    @case(1)
                    <button type="submit" class="btn customButton col-12 col-md-6"><i class="las la-piggy-bank" class="btnIcon"></i> Payed</button>
                        @break
                    @default
                    <button type="submit" class="btn customButton col-12 col-md-6"><i class="las la-parachute-box" class="btnIcon"></i> Delivering</button>
                @endswitch
            </section>
        </form>
        <hr class="icon"/>
</li>