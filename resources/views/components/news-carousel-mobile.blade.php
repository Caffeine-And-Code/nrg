<h1 class="title mt-5">{{__("messages.News")}}</h1>
<div id="carMobile" class="slide col-12 col-xs-12 d-flex justify-content-center" data-bs-ride="carousel">
    <div class="carousel-inner carousel">
        @foreach ($news as $new)
        <div class="carousel-item @if($loop->first) active @endif">
            <img src="{{ url($new->getImagePath()) }}" class="imgCarouselMobile d-block w-100 col-12 col-xs-12" alt="news">
        </div>
        @endforeach
    
  </div>