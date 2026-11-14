<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PurchaseHistoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'createLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'storeLogin'])->name('login.store');
    Route::get('/register', [AuthController::class, 'createRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegister'])->middleware('throttle:5,1,register')->name('register.store');
    Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('auth.google');
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');
    Route::get('/forgot-password', [PasswordResetController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'store'])->middleware('throttle:5,1,forgot-password')->name('password.email');
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'edit'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'update'])->name('password.update');
});

Route::post('/logout', [AuthController::class, 'destroy'])->middleware('auth')->name('logout');

Route::redirect('/jelajahi-program', '/program');

Route::get('/tentang', [AboutController::class, 'index'])->name('tentang');

Route::get('/program', [ProgramController::class, 'index'])->name('program');
Route::get('/program/{slug}', [ProgramController::class, 'show'])->name('program.detail');

Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel');
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('artikel.detail');

Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri');

Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');
Route::post('/kontak', [ContactController::class, 'store'])->middleware('throttle:5,1,contact')->name('kontak.store');

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
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->middleware('throttle:5,1,checkout')->name('checkout.store');
});

// 3. Invoice (/invoice/{id})
Route::get('/invoice/{id}', [CheckoutController::class, 'invoice'])->name('invoice.show');

// 4. Riwayat pembelian pengguna
Route::get('/riwayat-pembelian', [PurchaseHistoryController::class, 'index'])
    ->middleware('auth')
    ->name('purchase-history.index');
