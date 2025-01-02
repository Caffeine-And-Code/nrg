<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/* Client Routes */

Route::get('/', [UserController::class, 'index'])->name('home');

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
    });

});

/* Translations Route */

Route::get('/translations', [LangController::class, 'getTranslations'])->name('translations');
Route::post('/translations', [LangController::class, 'setLocale'])->name('setLocale');

Route::get('/send-mail', function () {
    Mail::raw('hello world', function ($message) {
        $message->to('recipient@example.com')
                ->subject('hi');
    });

    return 'Email sent successfully.';
});