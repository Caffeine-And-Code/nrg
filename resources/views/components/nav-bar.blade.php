@vite('/resources/css/components/header.css')
<header class="nav-bar">
    <img src="" alt="logo" class="logo" id="minimalLogo" />
    <figure>
        <img src="{{Vite::asset($imagePath)}}" alt="pageImage" />
        <figcaption translate="{{$title}}" class="title navTitle"></figcaption>
    </figure>
</header>
