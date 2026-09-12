<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(Request $request): View|JsonResponse
    {
        $selectedCategory = $request->query('kategori', 'Semua');

        $query = Gallery::query();

        if ($selectedCategory && $selectedCategory !== 'Semua') {
            $query->where('category', $selectedCategory);
        }

        $query->latest();

        $perPage = 6;
        $galleries = $query->paginate($perPage);

        // JSON response untuk fitur "Muat Lebih Banyak"
        if ($request->expectsJson() || $request->wantsJson()) {
            $formattedItems = [];

            foreach ($galleries as $item) {
                $formattedItems[] = [
                    'id' => $item->id,
                    'title' => $item->title,
                    'category' => $item->category ?? 'Kegiatan',
                    'image' => $item->image ? asset('storage/' . $item->image) : asset('img/Kids1.png'),
                    'description' => $item->description ?? '',
                ];
            }

            return response()->json([
                'items' => $formattedItems,
                'has_more' => $galleries->hasMorePages(),
                'current_page' => $galleries->currentPage(),
                'last_page' => $galleries->lastPage(),
                'total' => $galleries->total(),
            ]);
        }

        $categories = [
            'Semua',
            'Eksperimen',
            'Workshop',
            'Science Festival',
            'Roadshow',
        ];

        return view('Galeri', [
            'galleries' => $galleries,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'hasMore' => $galleries->hasMorePages(),
        ]);
    }
}
