<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
        Route::get('/', [UserController::class, 'index'])->name('home');
    });
});

/* Admin Routes */

Route::prefix("admin")->name("admin.")->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('authenticate');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::post('/destroyMe', [AdminController::class, 'destroy'])->name('destroyMe');
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
        Route::get("/users/search",[UserController::class, 'search'])->name('users.search');
        Route::get("/user/edit",[UserController::class, 'edit'])->name('user.edit');
        Route::get("/user/delete",[UserController::class, 'delete'])->name('user.delete');
    });
});

/* Translations Route */
Route::get('/translations', [LangController::class, 'getTranslations'])->name('translations');
Route::post('/translations', [LangController::class, 'setLocale'])->name('setLocale');
