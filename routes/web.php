<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;


// Главная страница
Route::get('/', [BlogController::class, 'index'])->name('home');
/*

Route::get('/', [App\Http\Controllers\BlogController::class, 'index'])->name('home');

 */

// Аутентификация
Auth::routes();

// Домашняя страница после входа
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Маршруты админки с middleware 'auth'
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/users', [AdminController::class, 'createUser'])->name('admin.createUser');
});

// Личный кабинет пользователя
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth')->name('user.dashboard');

// Маршруты форума
Route::middleware('auth')->group(function () {
    Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
    Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/{id}', [ForumController::class, 'show'])->name('forum.show');
});

// Профиль пользователя
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
