@php
    use Illuminate\Support\Number;
@endphp

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
    @vite('/resources/css/app.css')
    @vite('/resources/js/themeManager.js')
    @vite('/resources/js/lucky_wheel.js')
    @vite('/resources/css/components/header.css')
    @vite('resources/js/adminJs/footerNavigationManager.js')
    @vite('/resources/css/components/searchBar.css')
    @vite('/resources/css/components/userSearchBar.css')
    @vite("/resources/css/components/ProductDisplayer.css")
    @vite('resources/css/components/footerNavBar.css')
    @vite('resources/js/adminJs/footerNavigationManager.js')
    @vite('/resources/css/responsive.css')
    @vite("/resources/css/components/carousel.css")
    @vite("/resources/js/carousel.js")
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs@gh-pages/qrcode.min.js"></script>
    <link
        rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
    />
</head>
<body class="light">
<x-nav-bar title="Products" />
<main class="container mt-5 main">
    <div class="alert alert-success" role="alert">
        {{__("main.payment_success")}}
    </div>
    <x-single-order-displayer :order="$order" />
</main>
<x-navigation-footer mode="client"/>
</body>
</html>
