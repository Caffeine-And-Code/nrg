@php
    $advance=100 * $user->last_meter / $fdmeter;
    $lasting = $fdmeter - $user->last_meter;
@endphp

<section>
    <h2 class="title mobile">{{ __("messages.fdMeter") }}</h2>
    <div class="progress fdMeter-container" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar fdMeter" style="width: {{ $advance }}%"></div>
    </div>
    <div class="text-end">
        <h3 class="normalTextBold mt-1">€ {{ "$fdmeter" }}</h3>
    </div>
    <p class="smallTextRegular">{!! __("messages.howMuchLasts", ["lastM" => $lasting, "prize" => $fdprize]) !!}</p>
</section>