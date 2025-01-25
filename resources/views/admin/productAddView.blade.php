<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ __("Admin - Create a Product") }}</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        @vite('/resources/css/main.css')
        @vite('/resources/js/themeManager.js') @vite('/resources/css/app.css')
        @vite('/resources/css/responsive.css')
        @vite("/resources/css/views/productForm.css")
        @vite('/resources/css/components/header.css')
        @vite('resources/js/adminJs/footerNavigationManager.js') 
    </head>
    <body>
        <x-nav-bar title="Settings" />
        <main class="container main fullHeight">
            <x-add-and-edit-product-form :product="$product"/>
        </main>
        <x-navigation-footer mode="admin" />
    </body>
</html>
