<?php

namespace App\Http\Controllers;

use App\Models\Educator;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        $educators = Educator::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('Tentang', compact('educators'));
    }
}
