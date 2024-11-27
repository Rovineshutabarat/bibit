<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Store\CartController;
use App\Http\Controllers\Store\ProductDetailController;
use App\Http\Controllers\Store\StoreController;
use Illuminate\Support\Facades\Route;


Route::name("main.")->group(function () {
    Route::get("/", [MainController::class, 'homepage'])->name("homepage");
    // Route::get("/about", [MainController::class, 'profile'])->name("about");
    Route::get("/profile", [MainController::class, 'profile'])->name("profile")->middleware("auth");
});


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

Route::prefix("store")->name("store.")->group(function () {
    Route::get('/', [StoreController::class, 'index'])->name('index');
    Route::get('/detail/{id}', [ProductDetailController::class, 'index'])->name('product.detail');
});


Route::prefix('cart')->name('cart.')->middleware('auth')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post("/store/{id}", [CartController::class, "store"])->name("store");
    Route::delete("/delete/{id}", [CartController::class, "delete"])->name("delete");
});

