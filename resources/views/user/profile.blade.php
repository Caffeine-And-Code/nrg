<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{__("main.account")}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <link
            rel="stylesheet"
            href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
        />
    @vite('/resources/css/colors.css')
    @vite('/resources/css/main.css')
    @vite('/resources/css/app.css')
    @vite('/resources/js/themeManager.js')
    @vite('/resources/css/responsive.css')
    @vite('resources/css/components/footerNavBar.css')
    @vite('resources/js/adminJs/footerNavigationManager.js')
    @vite('/resources/js/adminJs/passwordBtnHandler.js')
    @vite('/resources/css/components/toDoOrder.css')
</head>
<body>
    <x-nav-bar title="Account"/>
    <main class="main container">
        <div class="user-components mt-5">
            <x-user-account-mobile :orders="$orders" :user="$user" :fmTarget="$fmTarget" :fmPrize="$fmPrize"/>
        </div>

        <x-site-setting/>
        <button class="btn notificationsAdminButton" data-bs-toggle="offcanvas" data-bs-target="#notifications"><i class="las la-bell icon"></i></button>
    </main>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="notifications">
        <div class="offcanvas-header">

            <h1 class="title smallTitle">{{ __("messages.Notifications") }}</h1>
            <button type="button" class="btn-close offCanvasButton" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="overflow-auto container offcanvas-body">
            <x-notifications-displayer :notifications="$notifications" :role="user"/>
        </div>
    </div>
</body>
</html>
