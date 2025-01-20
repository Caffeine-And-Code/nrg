<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DailySpinController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/* Client Routes */
Route::name("user.")->group(function () {
    Route::middleware("guest")->group(function () {
        Route::get("login", [\App\Http\Controllers\LoginController::class, "loginPage"])->name('login');
        Route::post("login", [\App\Http\Controllers\LoginController::class, "authenticate"])->name('authenticate');
        Route::get("register", [\App\Http\Controllers\LoginController::class, "registerPage"])->name('register');
        Route::post("register", [\App\Http\Controllers\LoginController::class, "register"])->name('create_user');
    });
    Route::middleware(['auth:user'])->group(function () {
        //ADD HERE LOGGED PROTECTED ROUTES
        Route::post("logout", [\App\Http\Controllers\LoginController::class, "logout"])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('home');
        Route::get("search", [\App\Http\Controllers\DashboardController::class, "search"])->name('search');
        Route::post("checkout/products/add", [\App\Http\Controllers\CheckoutController::class, "editProductCart"])->name('add_product_to_cart');
        Route::get("checkout", [\App\Http\Controllers\CheckoutController::class, "index"])->name('checkout');
        Route::post("checkout", [\App\Http\Controllers\CheckoutController::class, "checkout"])->name('post_checkout');
        Route::get("profile", [\App\Http\Controllers\ProfileController::class, "index"])->name('profile');
        Route::post("profile/edit", [\App\Http\Controllers\ProfileController::class, "editUser"])->name('profile_edit');
        Route::get("profile", [\App\Http\Controllers\ProfileController::class, "index"])->name('profile');
        Route::get("profile/order", [\App\Http\Controllers\OrderController::class, "show"])->name('order_details');
        Route::get("profile/order/json", [\App\Http\Controllers\OrderController::class, "showJson"])->name('order_details_json');
        Route::get("notification", [\App\Http\Controllers\NotificationController::class, "show"])->name('notification');

        Route::get("checkout/success", [\App\Http\Controllers\CheckoutController::class, "checkoutSession"])->name('checkout_success');
        Route::get("checkout/error", [\App\Http\Controllers\CheckoutController::class, "checkoutError"])->name('checkout_error');
    });
});

/* Admin Routes */

Route::prefix("admin")->name("admin.")->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('authenticate');

    Route::middleware('auth:admin')->group(function () {
        //admin
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::post('/destroyMe', [AdminController::class, 'destroy'])->name('destroyMe');
        Route::post("/deliveryCostUpdate", [AdminController::class, 'updateDeliveryCost'])->name('deliveryCostUpdate');
        Route::post("/updateFidelity", [AdminController::class, 'updateFidelity'])->name('updateFidelity');
        //views
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get("/settings", [AdminController::class, 'settings'])->name('settings');
        //news
        Route::post('/news', [NewsController::class, 'store'])->name('news.store');
        Route::post('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
        Route::get("/editNews",[NewsController::class, 'edit'])->name('news.edit');
        //products
        Route::get("/product/add",[ProductController::class, 'addProductView'])->name('product.add');
        Route::post("/product/add",[ProductController::class, 'addProduct'])->name('product.add');
        Route::post("/product/delete",[ProductController::class, 'destroy'])->name('product.delete');
        Route::post("/product/toggleVisibility",[ProductController::class, 'toggleVisibility'])->name('product.toggleVisibility');
        Route::post("/product/edit",[ProductController::class, 'editProduct'])->name('product.edit');
        Route::get("/product/search",[ProductController::class, 'search'])->name('product.search');
        //users
        Route::get("/users/search",[ProfileController::class, 'search'])->name('users.search');
        Route::get("/user/edit",[ProfileController::class, 'edit'])->name('user.edit');
        Route::post("/user/delete",[ProfileController::class, 'delete'])->name('user.delete');
        Route::post("/user/addDiscount",[ProfileController::class, 'addDiscount'])->name('user.addDiscount');
        //daily spin
        Route::get("/dailySpin/edit",[DailySpinController::class, 'editView'])->name('dailySpin.edit');
        Route::post("/dailySpin/add",[DailySpinController::class, 'add'])->name('dailySpin.add');
        Route::post("/dailySpin/delete",[DailySpinController::class, 'destroy'])->name('dailySpin.delete');
        //Classrooms
        Route::get("/classrooms/edit",[ClassroomController::class, 'editView'])->name('classrooms.edit');
        Route::post("/classrooms/add",[ClassroomController::class, 'add'])->name('classrooms.add');
        Route::post("/classrooms/delete",[ClassroomController::class, 'destroy'])->name('classrooms.delete');
    });
});

/* Translations Route */
Route::get('/translations', [LangController::class, 'getTranslations'])->name('translations');
Route::post('/translations', [LangController::class, 'setLocale'])->name('setLocale');
