<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
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

Route::get('/kontak', function () {
    return view('Kontak');
})->name('kontak');
