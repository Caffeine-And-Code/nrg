<div class="h-100 w-100 mobile p-3 main mt-5 pt-5">

    <section class="container row mt-3 flex-column">
        <h2>{{__("main.search")}}</h2>
        <div class="d-flex flex-row justify-content-center align-content-center">
        <x-user-search-bar :id="2"/>
        </div>
    </section>

    <section class="container row justify-content-start carouselContainer mb-5">
        <x-news-carousel-mobile :news="$news"/>
    </section>
    <section>
    <h1 class="title" >{{__("main.bestseller")}}</h1>
        <ul class="search-container container gap-1">
            @foreach($products as $product)
                    <x-product-search-card :product="$product"/>
            @endforeach
        </ul>
    </section>
</div>
