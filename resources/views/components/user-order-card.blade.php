@php
    use Carbon\Carbon;

    // Ora attuale
    $now = Carbon::now();

    // Orario di creazione dell'ordine
    $deliveryTime = Carbon::parse($order->created_at)->format('Y-m-d');

    // Numero di prodotti nell'ordine
    $productCount = $order->products->count();

    // Stato dell'ordine
    if (in_array($order->status, [1, 3])) {
        $orderStatus = 'preparazione';
    } elseif ($order->status == 4) {
        $orderStatus = 'completato';
    }

@endphp

<li class="justify-content-center" onclick="window.location.href='{{ route('user.get_order', ["id" => $order->getId()]) }}'">
        <figure class="td-flex justify-content-center user-order-card">
            <x-order-image-user-displayer :status="$order->status" />
            <figcaption class="col-md-6 col-12">
                <div class="user-order-details">
                    <div class="user-order-details-title">
                        <h3 class="normalTextBold">{{ $order->number }}</h3>
                        <h5 class="normalTextRegular">{{ $deliveryTime }}</h5>
                    </div>
                    <h5 class="normalTextRegular"> {{ $productCount }}  {{__("messages.product_s")}}</h5>
                    @if($order->status == 1 || $order->status == 3)
                        <h5 class="normalTextRegular"> {{ __("messages.orderInPrep") }}</h5>
                    @else
                    <h5 class="normalTextRegular"> {{ __("messages.orderCompleted") }}</h5>
                    @endif
                </div>

            </figcaption>
        </figure>
        <hr class="icon order_separators"/>
</li>
