<div class="flex-nowrap justify-content-start form-floating col-10 col-xs-10">
    <form class="input-group searchBarContainer inputContainerShadow h-100 d-flex justify-content-center" action="{{route("user.search")}}">
        <button type="submit" class="input-group-text">
            <i class="las la-search"></i>
        </button>
        <label class="d-none" for="search-product-{{$id}}">Email address</label>
        <input id="search-product-{{$id}}" type="text" name="search" class="form-control searchBar" placeholder="{{__("main.search")}}" value="{{ request("search") }}" />
    </form>
</div>
<form action="{{route("user.search")}}" method="get" class="formIconContainer col-1 col-xs-1 d-flex justify-content-center align-items-center">
    <input type="hidden" name="magic_product" value="1"  />
    
    <button type="submit" class="iconButton userMagicButton" aria-label="{{__("main.search_product")}}">
        <i class="las la-hat-wizard magicIcon"></i>
    </button>
</form>
