<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GuestController::class, 'index']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'doLogin']);
Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'doRegister']);

// Route::get('/marketplace', [CategoryController::class, 'index']);
// Route::get('/product', [ProductController::class, 'getProducts']);
// Route::get('/fetch-cart', [CartController::class, 'showCart']);
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [UserController::class, 'doLogout']);
    Route::middleware(['level:3'])->group(function () {
        Route::get('/marketplace', [CategoryController::class, 'index']);
        Route::get('/product', [ProductController::class, 'getProducts']);
        Route::get('/fetch-cart', [CartController::class, 'showCart']);
        Route::post('/add-to-cart', [CartController::class, 'addToCart']);
        Route::post('/clear-cart', [CartController::class, 'clearCart']);
        Route::post('/cart/delete', [CartController::class, 'deleteCartItemById']);
    });
});
