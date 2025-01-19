<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title translate="Admin - Create a Product"></title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        @vite('/resources/js/themeManager.js') @vite('/resources/css/app.css')
        @vite('/resources/js/translations/translation.js')
        @vite('/resources/css/responsive.css')
        @vite("/resources/css/views/productForm.css")
    </head>
    <body class="fullHeight">
        <x-nav-bar title="Settings" />
        <main class="container mt-5 main">
            <x-add-and-edit-product-form :product="$product"/>
        </main>
        <x-navigation-footer mode="admin" />
    </body>
</html>
