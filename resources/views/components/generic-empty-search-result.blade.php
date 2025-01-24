@vite('resources/css/components/noResult.css')
<section class="noResultContainer mb-5 mt-5">
    <h1 class="normalTextBold">{{ __("messages.noTextFor".$nameToDisplay) }}</h1>
    <a href="{{ route($goBackRoute) }}" class="btn neutralButton">{{ __("messages.Back") }}</a>
</section>
