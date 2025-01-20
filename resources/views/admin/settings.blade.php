<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title translate="admin - Settings"></title>
        @vite('/resources/js/themeManager.js')
        @vite('/resources/js/translations/translation.js')
        @vite('/resources/css/app.css') @vite('/resources/css/responsive.css')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
    </head>

    <body class="fullHeight">
        <x-nav-bar title="Settings" />
        <main class="container mt-5 main">
            @mobile
            <section class="mb-5 centerCol">
                <form
                    action="{{ route('admin.news.edit') }}"
                    class="col-12 mb-5"
                    method="get"
                >
                    <h1 class="title textShadow" translate="News"></h1>
                    @csrf
                    <button
                        class="customButton col-12 btn"
                        type="submit"
                        translate="edit_voices"
                    ></button>
                </form>
                {{--
                <x-news-displayer :news="$news" />
                --}}
            </section>
            <section class="mb-5">
                <x-products-displayer :products="$products" />
            </section>
            <section class="mb-5">
                <x-user-displayer :users="$users" />
            </section>
            <section class="mb-5 centerCol">
                    <h1 class="title textShadow mb-4 d-flex justify-content-start fullWidth" translate="FidelityMeter"></h1>
                    <form
                    action="{{ route('admin.updateFidelity') }}"
                    class="col-12 mb-5 row justify-content-between"
                    method="post"
                >
                    @csrf
                    <div class="inputgroup inputContainerShadow align-items-center col-5 mb-5">
                        <span class=" slideToLeft">
                            <i class="las la-euro-sign icon"></i>
                        </span>
                        <input class="form-control col-sm-10 col-md-11 col-10  customInput" type="number" min="0" step="0.1" name="price" placeholder="Price" required value="{{ $fm_prize }}" />
                        
                    </div>
                    <div class="inputgroup inputContainerShadow align-items-center col-5 mb-5">
                        <span class=" slideToLeft">
                            <i class="las la-bullseye icon"></i>
                        </span>
                        <input class="form-control col-sm-10 col-md-11 col-10  customInput" type="number" min="0" step="0.1" name="target" placeholder="Target" required value="{{ $fm_target }}" />
                        
                    </div>
                    <button
                        class="customButton col-12 btn"
                        type="submit"
                        translate="Confirm"
                    ></button>
                </form>
            </section>
            <section class="mb-5 centerCol">
                <form
                    action="{{ route('admin.dailySpin.edit') }}"
                    class="col-12 mb-5"
                    method="get"
                >
                    <h1 class="title textShadow mb-4" translate="DailySpin"></h1>
                    @csrf
                    <button
                        class="customButton col-12 btn"
                        type="submit"
                        translate="edit_voices"
                    ></button>
                </form>
            </section>
            <section class="mb-5 centerCol">
                <form
                    action="{{ route('admin.classrooms.edit') }}"
                    class="col-12 mb-5"
                    method="get"
                >
                    <h1 class="title textShadow mb-4" translate="Classrooms"></h1>
                    @csrf
                    <button
                        class="customButton col-12 btn"
                        type="submit"
                        translate="edit_voices"
                    ></button>
                </form>
            </section>
            <section class="mb-5 centerCol">
                <h1 class="mb-4 title textShadow d-flex justify-content-start fullWidth" translate="DeliveryCost"></h1>
                <form
                    action="{{ route('admin.deliveryCostUpdate') }}"
                    class="col-12 mb-5 row justify-content-between"
                    method="post"
                >
                    @csrf
                    <div class="inputgroup inputContainerShadow align-items-center col-5 ">
                        <span class=" slideToLeft">
                            <i class="las la-euro-sign icon"></i>
                        </span>
                        <input class="form-control col-sm-10 col-md-11 col-10  customInput" type="number" min="0" step="0.1" name="cost" placeholder="Cost" required value="{{ $delivery_cost }}" />
                        
                    </div>
                    <button
                        class="customButton col-5 btn"
                        type="submit"
                        translate="Confirm"
                    ></button>
                </form>
            </section>
            @elsemobile
            desktopView
            @endmobile
            <x-site-setting />
        </main>
        <x-navigation-footer mode="admin" />
    </body>
</html>
