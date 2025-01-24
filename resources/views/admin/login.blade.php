<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __("Admin - Login") }}</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('/resources/js/themeManager.js')
    @vite('/resources/css/views/userlogin.css')
    @vite('/resources/css/main.css')
    <!-- @vite('/resources/css/app.css') -->
    @vite('/resources/js/adminJs/passwordBtnHandler.js')
    @vite('/resources/css/responsive.css')
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
</head>

<body>
    <main>
        <section class="login-section">
            <figure>
                <img src="{{ Vite::asset('resources/imgs/LIGHT/bigLogo.png') }}" class="logo"
                    alt="bigLogo" id = "bigLogo" />
                <figcaption translate="AdminSection"></figcaption>
            </figure>
            <form class="login-form" action="{{ route('admin.authenticate') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M406.5 399.6C387.4 352.9 341.5 320 288 320l-64 0c-53.5 0-99.4 32.9-118.5 79.6C69.9 362.2 48 311.7 48 256C48 141.1 141.1 48 256 48s208 93.1 208 208c0 55.7-21.9 106.2-57.5 143.6zm-40.1 32.7C334.4 452.4 296.6 464 256 464s-78.4-11.6-110.5-31.7c7.3-36.7 39.7-64.3 78.5-64.3l64 0c38.8 0 71.2 27.6 78.5 64.3zM256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-272a40 40 0 1 1 0-80 40 40 0 1 1 0 80zm-88-40a88 88 0 1 0 176 0 88 88 0 1 0 -176 0z"/></svg>
                    </span>
                    <input class="form-input" type="email" name="email" placeholder="Email" >
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <svg class="icon" viewBox="0 0 16 19" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 0C5.243 0 2 2.243 2 5V6.5C0.897 6.5 0 7.397 0 8.5V16.5C0 17.603 0.897 18.5 2 18.5H14C15.103 18.5 16 17.603 16 16.5V8.5C16 7.397 15.103 6.5 14 6.5V5C14 2.243 10.757 0 8 0ZM14 8.5L14.002 16.5H2V8.5H14ZM4 6.5V5C4 3 6 2 8 2C10 2 12 3 12 5V6.5H4Z"/>
                        </svg>
                    </span>
                    <input class="form-input" type="password" name="password"
                        id="password" placeholder="Password">
                    <button type="button" class="togglePassword" id="togglePassword">
                        <svg class="eye icon" id="eye" xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 576 512">
                            <path
                                d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z">
                            </path>
                        </svg>
                        <svg class="eye-slash icon" id="eye-slash" xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 640 512">
                            <path
                                d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z">
                            </path>
                        </svg>
                    </button>
                </div>
                <button type="submit" class="btn" translate="Login"></button>
            </form>
        </section>
    </main>
</body>

</html>
