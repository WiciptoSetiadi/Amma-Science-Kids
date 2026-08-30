<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Beranda');
});

Route::get('/tentang', function () {
    return view('Tentang');
});

Route::get('/program', function () {
    return view('Katalog');
});

Route::get('/artikel', function () {
    return view('Artikel');
});

Route::get('/galeri', function () {
    return view('Galeri');
});

Route::get('/kontak', function () {
    return view('Kontak');
});
