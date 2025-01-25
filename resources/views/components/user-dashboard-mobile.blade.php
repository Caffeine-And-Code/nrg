<main class="mobile p-3 main">

    <section class="container row flex-nowrap justify-content-start mt-3">
        <x-user-search-bar />
    </section>

    <section class="container row justify-content-start carouselContainer mb-5">
        <x-news-carousel-mobile :news="$news"/>
    </section>
    <h1 class="title" >{{__("main.bestseller")}}</h1>
        <ul class="search-container container gap-1">
            @foreach($products as $product)
                    <x-product-search-card :product="$product"/>
            @endforeach
        </ul>
</main>
