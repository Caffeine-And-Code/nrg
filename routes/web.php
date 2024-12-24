<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;

/* Client Routes */

Route::get('/', [UserController::class, 'index'])->name('home');

/* Admin Routes */

Route::prefix("admin")->name("admin.")->group(function () {
    // TODO create a login page
    Route::get('/', [AdminController::class, 'index'])->name('index');
});

/* Translations Route */

Route::get('/translations', [LangController::class, 'getTranslations'])->name('translations');
Route::post('/translations', [LangController::class, 'setLocale'])->name('setLocale');