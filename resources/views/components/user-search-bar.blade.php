
@vite('/resources/css/components/searchBar.css')
@vite('/resources/css/components/userSearchBar.css')
<link
    rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
/>
<section class="flex-nowrap justify-content-start form-floating col-10 col-xs-10">
    <form class="input-group searchBarContainer inputContainerShadow" action="{{route("user.search")}}">
        <button type="submit" class="input-group-text">
            <i class="las la-search"></i>
        </button>
        <input type="text" name="search" class="form-control searchBar" placeholder="{{__("main.search")}}" value="{{ request("search") }}" />    
    </form>
</section>
<form action="{{route("user.magicProduct")}}" method="get" class="formIconContainer col-1 col-xs-1 centerRow">
    <button type="submit" class="iconButton" aria-label="{{__("main.search_product")}}">
        <i class="las la-hat-wizard magicIcon"></i>
    </button>
</form>