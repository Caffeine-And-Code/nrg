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
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    @vite('/resources/css/colors.css')
    @vite('/resources/css/main.css')
    @vite('/resources/css/app.css')
    @vite('/resources/js/themeManager.js')
    @vite('/resources/css/responsive.css')
    @vite('/resources/js/lucky_wheel.js')
    @vite('/resources/css/components/header.css')
    @vite('resources/js/adminJs/footerNavigationManager.js')
    @vite('resources/css/components/footerNavBar.css')
</head>
<body class="light">
<x-nav-bar title="Products" />
<main class="overflow-x-hidden desktop main mt-5">
    <section class="container">
        <h1>{{__("main.payment_error", ["order_id" => $order->getNumber()])}}</h1>
        <p>{{__("main.payment_error_description")}}</p>
        <div class="d-flex justify-content-center">
            <a title="{{__("main.continue_shipping")}}" href="{{route("user.home")}}" class="form-control btn customButton w-auto px-5">{{__("main.continue_shipping")}}</a>
        </div>
    </section>
</main>
<x-navigation-footer mode="client"/>
</body>
</html>
