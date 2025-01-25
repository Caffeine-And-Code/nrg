@vite("/resources/css/components/carousel.css")
@vite("/resources/js/carousel.js")

<ul class="gallery" >
    @foreach ($news as $new)
    <li class="carouselItem">
        <img class="imgCarousel" src="{{ url($new->getImagePath()) }}" alt="news">
    </li>        
    @endforeach
</ul>