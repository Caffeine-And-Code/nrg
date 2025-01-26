<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>{{ __("messages.admin - Settings") }}</title>
        @vite('/resources/js/themeManager.js')
        @vite('/resources/css/app.css') @vite('/resources/css/responsive.css')
        @vite("/resources/css/main.css")
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        @vite('/resources/css/components/header.css')
        @vite('resources/js/adminJs/footerNavigationManager.js') 
        @vite('/resources/css/components/footerNavBar.css')
    </head>

    <body>
        <x-nav-bar title="Settings" />
        <main class="main">
            <div class="container mobile mt-5">
                <section class="mb-5 centerCol">
                    <form
                        action="{{ route('admin.news.edit') }}"
                        class="col-12 mb-5"
                        method="get"
                    >
                        <h2 class="title textShadow">{{ __("messages.News") }}</h2>
                        @csrf
                        <button
                            class="customButton col-12 btn"
                            type="submit"
                        >{{ __("messages.edit_voices") }}</button>
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
                        <h2 class="title textShadow mb-4 d-flex justify-content-start fullWidth">{{ __("messages.FidelityMeter") }}</h2>
                        <form
                        action="{{ route('admin.updateFidelity') }}"
                        class="col-12 mb-5 row justify-content-between"
                        method="post"
                    >
                        @csrf
                        <div class="inputgroup inputContainerShadow align-items-center col-12 col-sx-5 mb-5">
                            <span class=" slideToLeft">
                                <i class="las la-euro-sign icon"></i>
                            </span>
                            <label for="priceFidelity" class="d-none">{{ __("messages.Price") }}</label>
                            <input class="form-control col-sm-10 col-md-11 col-10  customInput" type="number" min="0" step="0.1" name="price" id="priceFidelity" placeholder={{ __("messages.Price") }} required value="{{ $fm_prize }}" />
                            
                        </div>
                        <div class="inputgroup inputContainerShadow align-items-center col-12 col-sx-5 mb-5">
                            <span class=" slideToLeft">
                                <i class="las la-bullseye icon"></i>
                            </span>
                            <label for="targetFidelity" class="d-none">{{ __("messages.Target") }}</label>
                            <input class="form-control col-sm-10 col-md-11 col-10  customInput" type="number" min="0" step="0.1" name="target" id="targetFidelity" placeholder={{ __("messages.Target") }} required value="{{ $fm_target }}" />
                            
                        </div>
                        <button
                            class="customButton col-12 btn"
                            type="submit"
                        >{{ __("messages.Confirm") }}</button>
                    </form>
                </section>
                <section class="mb-5 centerCol">
                    <form
                        action="{{ route('admin.dailySpin.edit') }}"
                        class="col-12 mb-5"
                        method="get"
                    >
                        <h2 class="title textShadow mb-4">{{ __("messages.DailySpin") }}</h2>
                        @csrf
                        <button
                            class="customButton col-12 btn"
                            type="submit"
                            
                        >{{ __("messages.edit_voices") }}</button>
                    </form>
                </section>
                <section class="mb-5 centerCol">
                    <form
                        action="{{ route('admin.classrooms.edit') }}"
                        class="col-12 mb-5"
                        method="get"
                    >
                        <h2 class="title textShadow mb-4">{{ __("messages.Classrooms") }}</h2>
                        @csrf
                        <button
                            class="customButton col-12 btn"
                            type="submit"
                        >{{ __("messages.edit_voices") }}</button>
                    </form>
                </section>
                <section class="mb-5 centerCol">
                    <h2 class="mb-4 title textShadow d-flex justify-content-start fullWidth">{{ __("messages.DeliveryCost") }}</h2>
                    <form
                        action="{{ route('admin.deliveryCostUpdate') }}"
                        class="col-12 mb-5 row justify-content-between"
                        method="post"
                    >
                        @csrf
                        <div class="inputgroup inputContainerShadow align-items-center col-sm-5 col-12 mb-4 ">
                            <span class=" slideToLeft">
                                <i class="las la-euro-sign icon"></i>
                            </span>
                            <label for="costDelivery" class="d-none">{{ __("messages.Cost") }}</label>
                            <input class="form-control col-sm-10 col-md-11 col-10  customInput" type="number" min="0" step="0.1" name="cost" id="costDelivery" placeholder={{ __("messages.Cost") }} required value="{{ $delivery_cost }}" />
                            
                        </div>
                        <button
                            class="customButton col-sm-5 col-12 btn"
                            type="submit"
                        >{{ __("messages.Confirm") }}</button>
                    </form>
                </section>
            </div>
            <div class="desktopContainer desktop">
                <div class="row justify-content-between mb-5">
                    <div class="col-12 col-sm-12 col-md-5">
                        <x-products-displayer :products="$products" />
                        <x-user-displayer :users="$users" />
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 d-flex justify-content-around flex-column">
                        
                        <section class="mb-5">
                            <h2 class="title textShadow">{{ __("messages.News") }}</h2>
                            <button
                                class="customButton col-12 btn"
                                type="submit"
                                data-bs-toggle="offcanvas" data-bs-target="#news"
                            >{{ __("messages.edit_voices") }}</button>

                        </section>
                        <section class="centerCol">
                            <h2 class="title textShadow mb-4 d-flex justify-content-start fullWidth">{{ __("messages.FidelityMeter") }}</h2>
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
                                <label for="priceFidelityDEsk" class="d-none">{{ __("messages.Price") }}</label>
                                <input class="form-control col-sm-10 col-md-11 col-10  customInput" type="number" min="0" step="0.1" name="price" id="priceFidelityDEsk" placeholder={{ __("messages.Price") }} required value="{{ $fm_prize }}" />

                            </div>
                            <div class="inputgroup inputContainerShadow align-items-center col-md-12 col-lg-6 col-12 mb-4">
                                <span class=" slideToLeft">
                                    <i class="las la-bullseye icon"></i>
                                </span>
                                <label for="targetFidelityDesk" class="d-none">{{ __("messages.Target") }}</label>
                                <input class="form-control col-sm-10 col-md-11 col-10  customInput" type="number" min="0" step="0.1" name="target" id="targetFidelityDesk" placeholder={{ __("messages.Target") }} required value="{{ $fm_target }}" />

                            </div>
                            <button
                                class="customButton col-12 btn"
                                type="submit"
                            >{{ __("messages.Confirm") }}</button>
                        </form>
                        </section>
                        <section class="mb-5 centerCol">
                                <h2 class="title textShadow mb-4">{{ __("messages.DailySpin") }}</h2>
                                <button
                                    class="customButton col-12 btn"
                                    type="button"
                                    data-bs-toggle="offcanvas" data-bs-target="#entries"
                                >{{ __("messages.edit_voices") }}</button>
                        </section>
                        <section class="mb-5 centerCol">
                                <h2 class="title textShadow mb-4">{{ __("messages.Classrooms") }}</h2>
                                <button
                                    class="customButton col-12 btn"
                                    type="submit"
                                        data-bs-toggle="offcanvas" data-bs-target="#classrooms"
                                >{{ __("messages.edit_voices") }}</button>
                        </section>
                        <section class="mb-4 d-flex justify-content-center flex-column">
                            <h2 class="mb-4 title textShadow d-flex justify-content-start fullWidth">{{ __("messages.DeliveryCost") }}</h2>
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
                                    <label for="costDeliveryDEsk" class="d-none">{{ __("messages.Cost") }}</label>
                                    <input class="form-control col-sm-10 col-md-11 col-10  customInput" type="number" min="0" step="0.1" name="cost" id="costDeliveryDEsk" placeholder={{ __("messages.Cost") }} required value="{{ $delivery_cost }}" />

                                </div>
                                <button
                                    class="customButton col-md-12 col-lg-6 col-12 btn mb-4"
                                    type="submit"
                                >{{ __("messages.Confirm") }}</button>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
            
            
        <div class="p-4">
            <x-site-setting/>
        </div>
        </main>
            {{-- OFFCANVAS --}}
            <div class="offcanvas offcanvas-end" tabindex="-1" id="news">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close offCanvasButton" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="overflow-auto container main  ">
                    <x-news-displayer :news="$news" />
                </div>
            </div>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="entries">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close offCanvasButton" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="overflow-auto container main">
                    <x-daily-spin-displayer :entries="$entries" />
                </div>
            </div>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="classrooms">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close offCanvasButton" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="overflow-auto container main ">
                    <x-classrooms-displayer :classes="$classes" />
                </div>
            </div>

            @foreach ($products as $prod)
            <div class="offcanvas offcanvas-end" tabindex="-1" id={{ "products".$prod->id }}>
                <div class="offcanvas-header">
                    <button type="button" class="btn-close offCanvasButton" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body container main overflow-auto">
                    <x-add-and-edit-product-form :product="$prod"/>
                </div>
            </div>
            @endforeach

            @foreach ($users as $user)
            <div class="offcanvas offcanvas-end" tabindex="-1" id={{ "user".$user->id }} >
                <div class="offcanvas-header">
                    <button type="button" class="btn-close offCanvasButton" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="overflow-auto container main ">
                    <x-discount-and-delete-user-panel :user="$user" />
                </div>
            </div>
            @endforeach
            
            <x-navigation-footer mode="admin" />
    </body>
</html>
