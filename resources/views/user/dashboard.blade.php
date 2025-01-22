<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{__("main.dashboard")}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    @vite('/resources/css/colors.css')
    @vite('/resources/css/main.css')
</head>
<body class="light">
    <x-user-nav-bar currentPage="{{$currentPage}}"></x-user-nav-bar>
    <main class="h-100">
        <section class="row h-100">
            <section class="col-12 col-md-8">
                <article>
                    <div id="newsCarousel" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach($news as $singleNews)
                                <div class="carousel-item active">
                                    <img src="{{"/images/news/{$singleNews->getImagePath()}"}}" class="d-block w-100" alt="news">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </article>
            </section>
            <aside class="d-nome d-md-block col-md-4 h-100 bg-black">
                Aside
            </aside>
        </section>
    </main>
</body>
</html>
