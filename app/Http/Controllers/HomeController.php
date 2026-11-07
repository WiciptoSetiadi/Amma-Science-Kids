<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\HomepageContent;
use App\Models\HomepageVideo;
use App\Models\Program;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $homepageContent = HomepageContent::query()->first();

        if ($homepageContent?->is_configured) {
            $featuredArticle = $homepageContent->featuredArticle()
                ->where('is_published', true)
                ->with('category')
                ->first();

            $programIds = array_values(array_filter([
                $homepageContent->featured_program_one_id,
                $homepageContent->featured_program_two_id,
            ]));

            $programsById = Program::query()
                ->where('is_active', true)
                ->whereIn('id', $programIds)
                ->get()
                ->keyBy('id');

            $featuredPrograms = collect($programIds)
                ->map(fn (int $programId): ?Program => $programsById->get($programId))
                ->filter()
                ->values();
        } else {
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
        }

        $homepageVideo = $homepageContent?->featuredHomepageVideo;

        if (! $homepageVideo) {
            $homepageVideo = HomepageVideo::query()
                ->latest('updated_at')
                ->latest('id')
                ->first();
        }

        return view('Beranda', compact('featuredArticle', 'featuredPrograms', 'homepageVideo'));
    }
}
