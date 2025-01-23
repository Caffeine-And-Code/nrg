<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title translate="admin - Home"></title>
        @vite('/resources/js/themeManager.js')
        @vite('/resources/js/translations/translation.js')
        @vite('/resources/css/app.css') @vite('/resources/css/responsive.css')
        @vite('/resources/css/views/home.css')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
    </head>

    <body class="fullHeight">
        <x-nav-bar title="Orders" />
        <main class="container main">
            <x-orders-displayer :orders="$orders"/>
            <button class="btn notificationsAdminButton" data-bs-toggle="offcanvas" data-bs-target="#notifications"><i class="las la-bell icon"></i></button>
        </main>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="notifications" aria-labelledby="notificationsLabel">
            <div class="offcanvas-header">
                
                <h1 class="title smallTitle">Notifications</h1>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="overflow-auto container main ">
                <x-notifications-displayer :notifications="$notifications" />
            </div>
        </div>

        <x-navigation-footer mode="admin" />
    </body>
</html>
