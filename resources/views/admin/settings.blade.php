<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Settings</title>
    @vite('/resources/js/themeManager.js')
    @vite('/resources/js/translations/translation.js')
    @vite('/resources/css/app.css')
    @vite('/resources/js/changeTheme.js')
    @vite('/resources/js/changeLanguage.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <x-nav-bar title="Settings" />
    <main class="container mt-5">
        <section class="col-12">
            <h1 class="title" translate="Settings"></h1>
            <ul class="list-group list-group-flush">
                <li class="list-group-item pb-4 pt-4">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1 smallTitle" translate="ThemeChanger">List group item heading</h5>
                        <div class="btn-group radioGroup" role="group" aria-label="Theme changer">
                            <input type="radio" class="btn-check" name="btnradio" id="LIGHT" autocomplete="off">
                            <label class="btn" for="LIGHT" translate="LIGHT"></label>

                            <input type="radio" class="btn-check" name="btnradio" id="DARK" autocomplete="off">
                            <label class="btn" for="DARK" translate="DARK"></label>
                        </div>
                    </div>
                </li>
                <li class="list-group-item pb-4 pt-4">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1 smallTitle" translate="Translation">List group item heading</h5>
                        <div class="btn-group radioGroup" role="group" aria-label="Theme changer">
                            <input type="radio" class="btn-check" name="btnradio"  autocomplete="off">
                            <label class="btn" for="IT" translate="Italian" id="IT"></label>

                            <input type="radio" class="btn-check" name="btnradio"  autocomplete="off">
                            <label class="btn" for="EN" translate="English" id="EN"></label>
                        </div>
                    </div>
                </li>
            </ul>
        </section>
    </main>
    <x-navigation-footer mode="admin"/> 
</body>
</html>