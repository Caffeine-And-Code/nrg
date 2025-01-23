<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>scan QR code</title>
    @vite('/resources/js/themeManager.js')
    @vite('/resources/js/translations/translation.js')
    @vite('/resources/css/app.css') @vite('/resources/css/responsive.css')
    @vite('/resources/css/views/home.css')
    @vite(['resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    />
    
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript">
    @vite('/resources/js/adminJs/qrCodeScanner.js')

</head>
<body>
    <x-nav-bar title="Orders" />
        <main class="container main qrCodeContainer">
            <h1 class="title">Scan QR code</h1>
            <!-- Scanner dalla webcam -->
            <section id="qr-reader" class="qr-reader"></section>
            <section id="qr-reader-results"></section>
        </main>

    <x-navigation-footer mode="admin" />
</body>
</html>