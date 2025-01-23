<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR Code</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @vite('/resources/js/themeManager.js')
        @vite('/resources/js/translations/translation.js')
        @vite('/resources/css/app.css') @vite('/resources/css/responsive.css')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
</head>
<body>
    <x-nav-bar title="Orders" />
        <main class="container main">
            <img src="{{ asset('images/qr_codes/'.$qrCode.".png") }}" alt="QR Code" class="qrCode" />
        </main>

        <x-navigation-footer mode="admin" />
</body>
</html>