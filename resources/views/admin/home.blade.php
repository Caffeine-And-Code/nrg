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
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
    </head>

    <body class="fullHeight">
        <x-nav-bar title="Orders" />
        <main class="container main"></main>

        <x-navigation-footer mode="admin" />
    </body>
</html>
