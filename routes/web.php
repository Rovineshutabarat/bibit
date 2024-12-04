<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Store\CartController;
use App\Http\Controllers\Store\OrderController;
use App\Http\Controllers\Store\ProductDetailController;
use App\Http\Controllers\Store\StoreController;
use Illuminate\Support\Facades\Route;


Route::name("main.")->group(function () {
    Route::get("/", [MainController::class, 'homepage'])->name("homepage");
    Route::get("/profile", [MainController::class, 'profile'])->name("profile")->middleware("auth");
    Route::get("/contact-us", [MainController::class, 'ContactUs'])->name("contact.us");
    Route::get("/about-us", [MainController::class, 'AboutUs'])->name("about.us");
    Route::post("/update/profile/{id}", [AuthController::class, "update"])->name("update.profile")->middleware('auth');
    Route::delete("/delete/profile/{id}", [AuthController::class, "deleteProfilePicture"])->name("delete.profile.picture")->middleware('auth');
});


Route::prefix("adminpage")->name("adminpage.")->middleware('auth')->group(function () {
    // category
    Route::prefix("category")->name("category.")->group(function () {
        // view
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        // operation
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::post('/search', [CategoryController::class, 'search'])->name('search');
        Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });
    // product
    Route::prefix("product")->name("product.")->group(function () {
        // View
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        // Operation
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
    });
});

Route::prefix("auth")->name("auth.")->middleware('guest')->group(function () {
    // view
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::get('/register', [AuthController::class, 'registerView'])->name('register');
    // operation
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

Route::prefix('order')->name('order.')->middleware('auth')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::post('/store/{id}', [OrderController::class, 'store'])->name('store');
});

