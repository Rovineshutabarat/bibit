<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\StoreController;

Route::prefix("adminpage")->name("adminpage.")->middleware('auth')->group(function () {
    // category
    Route::prefix("category")->name("category.")->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });
    // product
    Route::prefix("product")->name("product.")->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
    });
});

Route::prefix("auth")->name("auth.")->middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::get('/register', [AuthController::class, 'registerView'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::get("/auth/logout", [AuthController::class, "logout"])->middleware("auth")->name('auth.logout');

Route::prefix('login/google')->name('login.google.')->middleware('guest')->group(function () {
    Route::get('/redirect', [SocialiteController::class, 'redirect'])->name('redirect');
    Route::get('/callback', [SocialiteController::class, 'callback'])->name('callback');
});

Route::prefix("store")->name("store.")->middleware('guest')->group(function () {
    Route::get('/', [StoreController::class, 'index'])->name('index');
    Route::get('/cart', [StoreController::class, 'cart'])->name('cart');
});
