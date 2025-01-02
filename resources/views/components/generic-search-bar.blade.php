@vite('/resources/css/components/searchBar.css')
<div class="centerRow fullWidth mb-4">
    <form class="form-floating fullWidth" action="{{ $searchRoute }}" method="get">
        @csrf
        <div class="input-group searchBarContainer">
            <button type="submit" class="input-group-text"><i class="las la-search"></i></button>
            <input type="email" class=" form-control searchBar" name="email" id="email" translate="Search">
        </div>
    </form>
    <form action="{{ $buttonRoute }}" method="get" class="formIconContainer col-1">
        @csrf
        <button type="submit" class="iconButton"><i class="la la-plus"></i></button>
    </form>
</div>