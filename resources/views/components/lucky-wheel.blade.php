<section class="order-2 order-xl-0 col-12 col-xl-6">
    <h2>{{__("main.bestseller")}}</h2>
    <div class="d-flex">
        <x-user-search-bar :id="1"/>
    </div>
    <ul class="search-container">
        @foreach($products as $product)
            <x-product-search-card :product="$product"/>
        @endforeach
    </ul>
</section>
@if ($spinWheel)
    <section class="px-5 container order-0 order-xl-2 col-12 col-xl-6">
        <h2>{{__("main.daily_spin")}}</h2>

        <div class="wheel-article mb-5 d-flex flex-column justify-content-center gap-2">
            <fieldset class="ui-wheel-of-fortune h-100">
                <ul>
                    <li data-id="0" data-text="nullo">{{__("main.null_win")}}</li>
                    @foreach($spinValues as $value)
                        <li data-id="{{$value->getId()}}" data-text="{{$value->getText()}}">{{$value->getText()}}</li>
                    @endforeach
                </ul>
            </fieldset>
            <input type="hidden" name="spin-value" id="spin-value" value="{{$spinValue}}">
            <button class="customButton" id="spin-btn">{{__("main.run_lucky_wheel")}}</button>
            <p class="spin-result" ></p>
        </div>
    </section>
@elseif(isset($wheel_last_win) && $wheel_last_win !== null)
    <section class="px-5 container order-0 order-xl-2 col-12 col-xl-6">
        <h2>{{__("main.daily_spin")}}</h2>
        @if ($wheel_last_win == "null_win_reserved_field_immutable_1237871263")
            <p>{!! __("main.wheel_fail") !!}</p>
        @else
            <p>{!! __("main.wheel_win", ["win" => $wheel_last_win]) !!}</p>
        @endif
    </section>
@endif
