<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Beranda');
})->name('home');

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
