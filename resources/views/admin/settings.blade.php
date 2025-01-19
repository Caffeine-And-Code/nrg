<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title translate="admin - Settings"></title>
        @vite('/resources/js/themeManager.js')
        @vite('/resources/js/translations/translation.js')
        @vite('/resources/css/app.css') @vite('/resources/css/responsive.css')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
    </head>

    <body class="fullHeight">
        <x-nav-bar title="Settings" />
        <main class="container mt-5 main">
            @mobile
            <section class="mb-5 centerCol">
                <form
                    action="{{ route('admin.news.edit') }}"
                    class="col-12 mb-5"
                    method="get"
                >
                    <h1 class="title textShadow" translate="News"></h1>
                    @csrf
                    <button
                        class="customButton col-12 btn"
                        type="submit"
                        translate="edit_voices"
                    ></button>
                </form>
                {{--
                <x-news-displayer :news="$news" />
                --}}
            </section>
            <section class="mb-5">
                <x-products-displayer :products="$products" />
            </section>
            <section class="mb-5">
                <x-user-displayer :users="$users" />
            </section>
            @elsemobile
            desktopView
            @endmobile
            <x-site-setting />
        </main>
        <x-navigation-footer mode="admin" />
    </body>
</html>
