<?php

use App\Models\Article;
use App\Models\Gallery;
use App\Models\Program;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Beranda');
});

Route::get('/tentang', function () {
    return view('Tentang');
});

Route::get('/program', function () {
    $programs = Program::where('is_active', true)->latest()->get();

    return view('Katalog', compact('programs'));
});

Route::get('/artikel', function () {
    $articles = Article::where('is_published', true)->with('category')->latest('published_at')->get();

    return view('Artikel', compact('articles'));
});

Route::get('/artikel/{slug}', function ($slug) {
    $article = Article::where('slug', $slug)->where('is_published', true)->firstOrFail();

    return view('ArtikelDetail', compact('article'));
});

Route::get('/galeri', function () {
    $galleries = Gallery::latest()->get();

    return view('Galeri', compact('galleries'));
});

Route::get('/kontak', function () {
    return view('Kontak');
});
