@vite('/resources/css/components/searchBar.css')

@php
    $randomNumber = rand(0, 100000);
@endphp

<link
    rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
/>
<div class="centerRow container mb-4 ">
    <form
        class="form-floating fullWidth"
        action="{{ route($searchRoute) }}"
        method="get"
        class="col-10"
    >
        @csrf
        <div class="input-group searchBarContainer inputContainerShadow">
            <button type="submit" class="input-group-text">
                <i class="las la-search"></i>
            </button>
            <label for={{ "searchInput" . $searchRoute. $randomNumber }} class="d-none">
                {{ __("messages.Search") }}
            </label>
            <input
                type="text"
                class="form-control searchBar"
                name="searchInput"
                id={{ "searchInput" . $searchRoute . $randomNumber }}
                placeholder="{{ __("messages.Search") }}"
            />
        </div>
    </form>
    @if ($mode == 'admin' && $buttonRoute != null)
        <form
        action="{{ $buttonRoute }}"
        method="get"
        class="formIconContainer col-1 centerRow"
        >
        @csrf
        <button type="submit" class="iconButton">
            <i class="la la-plus"></i>
        </button>
    </form>
    @endif
</div>
