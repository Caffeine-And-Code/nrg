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

    <body>
        <x-nav-bar title="Settings" />
        @mobile
        <main class="container main">
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
            <x-site-setting />
        </main>
            @elsemobile
            <main class="main desktopContainer ">
                <section class="row justify-content-between mb-5">
                    <section class="col-12 col-sm-12 col-md-5">
                        <x-products-displayer :products="$products" />
                        <x-user-displayer :users="$users" />
                    </section>
                    <section class="col-12 col-sm-12 col-md-6 d-flex justify-content-around flex-column">
                        
                        <section class="mb-4">
                            <h1 class="title textShadow" translate="News"></h1>
                            <button
                                class="customButton col-12 btn"
                                type="submit"
                                translate="edit_voices"
                                data-bs-toggle="offcanvas" data-bs-target="#news"
                            ></button>
                            
                        </section>
                        <section class="mb-4 centerCol">
                            <h1 class="title textShadow mb-4 d-flex justify-content-start fullWidth" translate="FidelityMeter"></h1>
                            <form
                            action="{{ route('admin.updateFidelity') }}"
                            class="col-12 mb-5 row justify-content-between"
                            method="post"
                        >
                            @csrf
                            <div class="inputgroup inputContainerShadow align-items-center col-lg-5 col-md-12 col-12 mb-4">
                                <span class=" slideToLeft">
                                    <i class="las la-euro-sign icon"></i>
                                </span>
                                <input class="form-control col-sm-10 col-md-11 col-10  customInput" type="number" min="0" step="0.1" name="price" placeholder="Price" required value="{{ $fm_prize }}" />
                                
                            </div>
                            <div class="inputgroup inputContainerShadow align-items-center col-md-12 col-lg-6 col-12 mb-4">
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
                        <section class="mb-4 centerCol">
                                <h1 class="title textShadow mb-4" translate="DailySpin"></h1>
                                <button
                                    class="customButton col-12 btn"
                                    type="button"
                                    translate="edit_voices"
                                     data-bs-toggle="offcanvas" data-bs-target="#entries"
                                ></button>
                        </section>
                        <section class="mb-4 centerCol">
                                <h1 class="title textShadow mb-4" translate="Classrooms"></h1>
                                <button
                                    class="customButton col-12 btn"
                                    type="submit"
                                    translate="edit_voices"
                                        data-bs-toggle="offcanvas" data-bs-target="#classrooms"
                                ></button>
                        </section>
                        <section class="mb-4 d-flex justify-content-center flex-column">
                            <h1 class="mb-4 title textShadow d-flex justify-content-start fullWidth" translate="DeliveryCost"></h1>
                            <form
                                action="{{ route('admin.deliveryCostUpdate') }}"
                                class="col-12 mb-5 row justify-content-between"
                                method="post"
                            >
                                @csrf
                                <div class="inputgroup inputContainerShadow align-items-center col-md-12 col-lg-5 col-12 mb-4 ">
                                    <span class=" slideToLeft">
                                        <i class="las la-euro-sign icon"></i>
                                    </span>
                                    <input class="form-control col-sm-10 col-md-11 col-10  customInput" type="number" min="0" step="0.1" name="cost" placeholder="Cost" required value="{{ $delivery_cost }}" />
                                    
                                </div>
                                <button
                                    class="customButton col-md-12 col-lg-6 col-12 btn mb-4"
                                    type="submit"
                                    translate="Confirm"
                                ></button>
                            </form>
                        </section>
                    </section>
                </section>
                <x-site-setting />
            </main>
            {{-- OFFCANVAS --}}
            <div class="offcanvas offcanvas-end" tabindex="-1" id="news" aria-labelledby="newsLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="overflow-auto container main  ">
                    <x-news-displayer :news="$news" />
                </div>
            </div>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="entries" aria-labelledby="entriesLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="overflow-auto container main">
                    <x-daily-spin-displayer :entries="$entries" />
                </div>
            </div>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="classrooms" aria-labelledby="classroomsLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="overflow-auto container main ">
                    <x-classrooms-displayer :classes="$classes" />
                </div>
            </div>
            
            @endmobile
        <x-navigation-footer mode="admin" />
    </body>
</html>
