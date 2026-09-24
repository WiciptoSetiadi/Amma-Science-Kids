<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Beranda');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'createLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'storeLogin'])->name('login.store');
    Route::get('/register', [AuthController::class, 'createRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');
});

Route::post('/logout', [AuthController::class, 'destroy'])->middleware('auth')->name('logout');

Route::redirect('/jelajahi-program', '/program');

Route::get('/tentang', function () {
    return view('Tentang');
})->name('tentang');

Route::get('/program', [ProgramController::class, 'index'])->name('program');

Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel');
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('artikel.detail');

Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri');

Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');
Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.store');

// =======================
// E-COMMERCE / ORDER FLOW
// =======================
// 1. Keranjang Belanja (/cart)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/{id}/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// 2. Checkout (/checkout)
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

// 3. Invoice (/invoice/{id})
Route::get('/invoice/{id}', [CheckoutController::class, 'invoice'])->name('invoice.show');
