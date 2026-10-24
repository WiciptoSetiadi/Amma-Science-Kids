<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Program;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredArticle = Article::query()
            ->where('is_published', true)
            ->with('category')
            ->latest('published_at')
            ->first();

        $featuredPrograms = Program::query()
            ->where('is_active', true)
            ->latest('id')
            ->take(2)
            ->get();

        return view('Beranda', compact('featuredArticle', 'featuredPrograms'));
    }
}
