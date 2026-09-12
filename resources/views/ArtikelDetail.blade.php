<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $article->title }} - Amma Science Kids</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background-image: linear-gradient(rgba(117,119,127,0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(117,119,127,0.05) 1px, transparent 1px); background-size: 24px 24px; }
        .article-content p { margin-bottom: 1.25rem; line-height: 1.75; color: #374151; font-size: 1.05rem; }
        .article-content h1, .article-content h2, .article-content h3, .article-content h4 { color: #031636; font-weight: 700; margin-top: 1.75rem; margin-bottom: 0.75rem; line-height: 1.3; }
        .article-content h2 { font-size: 1.5rem; }
        .article-content h3 { font-size: 1.25rem; }
        .article-content ul, .article-content ol { margin-left: 1.5rem; margin-bottom: 1.25rem; }
        .article-content ul { list-style-type: disc; }
        .article-content ol { list-style-type: decimal; }
        .article-content li { margin-bottom: 0.5rem; line-height: 1.6; }
        .article-content blockquote { border-left: 4px solid #0c4185; padding-left: 1rem; font-style: italic; color: #4b5563; margin: 1.5rem 0; }
        .article-content img { rounded-lg: 0.5rem; margin: 1.5rem 0; max-width: 100%; height: auto; }
    </style>
</head>
<body class="font-sans antialiased bg-[#fbf8fc] text-[#44474e]">

    {{-- NAVBAR --}}
    <header class="sticky top-0 z-50 border-b border-white/20 shadow-md"
            style="background: rgba(12,65,133,0.95); backdrop-filter: blur(6px);">
        <div class="max-w-7xl mx-auto px-6 md:px-10 py-3 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 shrink-0">
                <img src="{{ asset('img/Logo.png') }}"
                     alt="Amma Science Kids Logo"
                     class="h-[56px] w-[56px] object-contain rounded" />
            </a>
            <nav class="hidden lg:flex items-center gap-1 text-sm font-medium">
                <a href="/"        class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Beranda</a>
                <a href="/tentang" class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition leading-tight">Tentang<br>Kami</a>
                <a href="/program" class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Program</a>
                <a href="/artikel" class="px-3 py-2 rounded-lg text-[#fc6c29] tracking-[0.05em] transition">Artikel</a>
                <a href="/galeri"  class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Galeri</a>
                <a href="/kontak"  class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Kontak</a>
            </nav>
            <div class="flex items-center gap-4">
                <button class="flex items-center justify-center w-9 h-9 rounded-full text-white hover:text-[#fc6c29] transition" aria-label="Keranjang">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </button>
                <a href="#" class="hidden md:flex items-center px-4 py-2 text-sm text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Masuk</a>
                <a href="#" class="bg-[#e95605] hover:bg-[#cc4a0f] text-white text-sm tracking-[0.05em] px-6 py-2.5 rounded-full font-medium transition shadow-sm text-center leading-tight">
                    Pesan<br>Sekarang
                </a>
            </div>
        </div>
    </header>

    <main class="bg-white py-10">

        <article class="max-w-4xl mx-auto px-6 md:px-10">
            {{-- BACK BUTTON & METADATA --}}
            <div class="mb-6">
                <a href="/artikel" class="inline-flex items-center gap-2 text-sm font-medium text-[#0c4185] hover:text-[#fc6c29] transition mb-6">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Daftar Artikel
                </a>

                <div class="flex items-center gap-3 mb-4">
                    @if ($article->category)
                        <span class="bg-[#0c4185]/10 text-[#0c4185] text-xs font-semibold px-3 py-1 rounded-full">
                            {{ $article->category->name }}
                        </span>
                    @endif
                    <span class="text-xs text-gray-500 flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        {{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}
                    </span>
                </div>

                <h1 class="font-display font-extrabold text-[#031636] text-3xl md:text-5xl leading-tight tracking-tight mb-6">
                    {{ $article->title }}
                </h1>
            </div>

            {{-- FEATURED IMAGE --}}
            @if ($article->image)
                <div class="mb-8 rounded-2xl overflow-hidden shadow-lg border border-gray-100 max-h-[480px]">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover" />
                </div>
            @endif

            {{-- ARTICLE CONTENT --}}
            <div class="article-content bg-[#fbf8fc] p-6 md:p-10 rounded-2xl border border-gray-100 shadow-sm">
                {!! $article->content !!}
            </div>

            {{-- FOOTER / BACK LINK --}}
            <div class="mt-10 pt-6 border-t border-gray-200 flex items-center justify-between">
                <a href="/artikel" class="inline-flex items-center gap-2 text-sm font-semibold text-[#0c4185] hover:text-[#fc6c29] transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Lihat Artikel Lainnya
                </a>
            </div>

        </article>

    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

</body>
</html>
