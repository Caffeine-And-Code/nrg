@vite('/resources/css/components/searchBar.css')

<link
    rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
/>
<div class="centerRow fullWidth mb-4">
    <form
        class="form-floating fullWidth"
        action="{{ $searchRoute }}"
        method="get"
    >
        @csrf
        <div class="input-group searchBarContainer inputContainerShadow">
            <button type="submit" class="input-group-text">
                <i class="las la-search"></i>
            </button>
            <input
                type="email"
                class="form-control searchBar"
                name="email"
                id="email"
                translate="Search"
            />
        </div>
    </form>
    <form
        action="{{ $buttonRoute }}"
        method="get"
        class="formIconContainer col-1"
    >
        @csrf
        <button type="submit" class="iconButton">
            <i class="la la-plus"></i>
        </button>
    </form>
</div>
