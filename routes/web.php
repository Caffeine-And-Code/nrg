<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
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
        Route::get("notification", [\App\Http\Controllers\NotificationController::class, "show"])->name('notification');
    });
});

/* Admin Routes */

Route::prefix("admin")->name("admin.")->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('authenticate');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get("/settings", [AdminController::class, 'settings'])->name('settings');
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::post('/news', [NewsController::class, 'store'])->name('news.store');
        Route::post('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
        Route::get("/editNews",[NewsController::class, 'edit'])->name('news.edit');
        Route::get("/product/add",[ProductController::class, 'addProductView'])->name('product.add');
        Route::post("/product/add",[ProductController::class, 'addProduct'])->name('product.add');
    });
});

/* Translations Route */
Route::get('/translations', [LangController::class, 'getTranslations'])->name('translations');
Route::post('/translations', [LangController::class, 'setLocale'])->name('setLocale');
