<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/* Client Routes */

Route::get('/', [UserController::class, 'index'])->name('home');

/* Admin Routes */

Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
