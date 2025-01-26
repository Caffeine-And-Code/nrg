@php
    use Carbon\Carbon;

    // Ora attuale
    $now = Carbon::now();

    // Orario di creazione dell'ordine
    $deliveryTime = Carbon::parse($order->created_at)->format('Y-m-d');

    // Numero di prodotti nell'ordine
    $productCount = $order->products->count();

@endphp

<li class="justify-content-center" onclick="window.location.href='{{ route('user.get_order', ["id" => $order->getId()]) }}'">
        <figure class="td-flex justify-content-center user-order-card">
            <x-order-image-user-displayer :status="$order->status" />
            <figcaption class="col-md-6 col-12">
                <div class="user-order-details">
                    <div class="user-order-details-title">
                        <h3 class="normalTextBold">{{ $order->number }}</h3>
                        <h4 class="normalTextRegular">{{ $deliveryTime }}</h4>
                    </div>
                    <h3 class="normalTextRegular"> {{ $productCount }}  {{__("messages.product_s")}}</h3>
                    @if($order->status == 1 )
                        <h4 class="normalTextRegular"> {{ __("messages.orderInPrep") }}</h4>
                    @elseif($order->status == 3)
                    <h4 class="normalTextRegular"> {{ __("messages.orderInDeli") }}</h4>
                    @else
                    <h4 class="normalTextRegular"> {{ __("messages.orderCompleted") }}</h4>
                    @endif
                </div>

            </figcaption>
        </figure>
        <hr class="icon order_separators"/>
</li>
