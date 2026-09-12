<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProgramController extends Controller
{
    public function index(Request $request): View
    {
        $query = Program::query()->where('is_active', true);

        // Pencarian keyword
        $search = $request->query('search');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter Kategori
        $selectedCategory = $request->query('kategori');
        if ($selectedCategory && $selectedCategory !== 'Semua Program') {
            $query->where('category', $selectedCategory);
        }

        // Filter Usia (Array atau String)
        $rawAges = $request->query('usia', []);
        $selectedAges = is_array($rawAges) ? $rawAges : [$rawAges];
        $selectedAges = array_values(array_filter($selectedAges));

        if (! empty($selectedAges)) {
            $query->where(function ($q) use ($selectedAges) {
                foreach ($selectedAges as $age) {
                    $q->orWhere('target_age', 'like', "%{$age}%");
                }
            });
        }

        // Pengurutan
        $sort = $request->query('sort', 'terpopuler');
        if ($sort === 'terbaru') {
            $query->latest('created_at');
        } elseif ($sort === 'harga-rendah') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'harga-tinggi') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest('id');
        }

        $programs = $query->get();

        $categories = [
            'Semua Program',
            'Program Anak',
            'Workshop Guru & Ortu',
            'Family Learning',
            'Event Festival',
        ];

        $availableAges = [
            'TK/RA',
            'SD/MI',
            'Homeschooling / PKBM',
        ];

        return view('Katalog', compact(
            'programs',
            'categories',
            'selectedCategory',
            'availableAges',
            'selectedAges',
            'search',
            'sort'
        ));
    }
}
