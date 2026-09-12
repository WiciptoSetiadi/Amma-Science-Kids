<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(Request $request): View|JsonResponse
    {
        $selectedCategory = $request->query('kategori', 'Semua Artikel');

        $query = Article::query()
            ->where('is_published', true)
            ->with('category')
            ->latest('published_at');

        if ($selectedCategory && $selectedCategory !== 'Semua Artikel') {
            $query->whereHas('category', function ($q) use ($selectedCategory) {
                $q->where('slug', $selectedCategory)
                    ->orWhere('name', $selectedCategory);
            });
        }

        $perPage = 6;
        $articles = $query->paginate($perPage);

        // JSON response untuk fitur "Muat Lebih Banyak"
        if ($request->expectsJson() || $request->wantsJson()) {
            $formattedItems = [];

            foreach ($articles as $item) {
                $publishedOrCreated = $item->published_at ?? $item->created_at;

                $formattedItems[] = [
                    'id' => $item->id,
                    'title' => $item->title,
                    'slug' => $item->slug,
                    'url' => route('artikel.detail', $item->slug),
                    'category_name' => $item->relationLoaded('category') && $item->category ? $item->category->name : 'Sains',
                    'image' => $item->image ? asset('storage/' . $item->image) : asset('img/Kids1.png'),
                    'excerpt' => Str::limit(strip_tags((string) $item->content), 120),
                    'date' => $publishedOrCreated ? $publishedOrCreated->format('d M Y') : '',
                ];
            }

            return response()->json([
                'items' => $formattedItems,
                'has_more' => $articles->hasMorePages(),
                'current_page' => $articles->currentPage(),
                'last_page' => $articles->lastPage(),
                'total' => $articles->total(),
            ]);
        }

        $categories = Category::orderBy('name')->get();

        // Featured article untuk sorotan utama
        $featuredArticle = Article::where('is_published', true)
            ->with('category')
            ->latest('published_at')
            ->first();

        return view('Artikel', [
            'articles' => $articles,
            'featuredArticle' => $featuredArticle,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'hasMore' => $articles->hasMorePages(),
        ]);
    }

    public function show(string $slug): View
    {
        $article = Article::where('slug', $slug)
            ->where('is_published', true)
            ->with('category')
            ->firstOrFail();

        $relatedArticles = Article::where('id', '!=', $article->id)
            ->where('is_published', true)
            ->when($article->category_id, fn ($q) => $q->where('category_id', $article->category_id))
            ->with('category')
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('ArtikelDetail', compact('article', 'relatedArticles'));
    }
}
