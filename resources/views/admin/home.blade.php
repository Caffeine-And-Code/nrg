<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Admin</title>
    @vite('/resources/js/translations/translation.js')
    @vite('/resources/css/app.css')
</head>
<body>
    <x-nav-bar title="Orders" />
    <h1 translate="Settings"></h1>
    <button id="prova">cambia lingua in italiano</button>
</body>
</html>