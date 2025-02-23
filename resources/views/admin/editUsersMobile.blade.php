<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __("Admin - Edit User") }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
        @vite('/resources/js/themeManager.js')
        @vite('/resources/css/app.css') 
        @vite('/resources/css/responsive.css')
        @vite('/resources/css/main.css')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
        />
        
        @vite('/resources/css/components/header.css')
        @vite('resources/js/adminJs/footerNavigationManager.js') 
</head>
<body class="fullHeight">
    <x-nav-bar title="Settings" />
    <main class="container main">
        <x-discount-and-delete-user-panel :user="$user" />
    </main>
    <x-navigation-footer mode="admin" />    
</body>
</html>