<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jurnal Eksplorasi - Amma Science Kids</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background-image: linear-gradient(rgba(117,119,127,0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(117,119,127,0.05) 1px, transparent 1px); background-size: 24px 24px; }
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
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </button>
                <a href="#" class="hidden md:flex items-center px-4 py-2 text-sm text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Masuk</a>
                <a href="#" class="bg-[#e95605] hover:bg-[#cc4a0f] text-white text-sm tracking-[0.05em] px-6 py-2.5 rounded-full font-medium transition shadow-sm text-center leading-tight">
                    Pesan<br>Sekarang
                </a>
            </div>
        </div>
    </header>

    <main class="bg-white">

        {{-- HEADER SECTION --}}
        <section class="max-w-7xl mx-auto px-6 md:px-12 pt-12 pb-4">
            <div class="relative">
                <div class="absolute right-0 top-0 w-28 h-28 opacity-60 pointer-events-none">
                    <svg viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="60" cy="60" r="58" stroke="#7ef4fc" stroke-width="1.5" stroke-dasharray="6 4"/>
                        <circle cx="60" cy="60" r="38" stroke="#a6fffe" stroke-width="1" stroke-dasharray="4 4"/>
                    </svg>
                </div>
                <div class="text-2xl mb-3">🔬</div>
                <div class="relative inline-block mb-2">
                    <h1 class="font-display font-extrabold text-[#031636] text-4xl md:text-5xl tracking-tight"
                        style="font-variation-settings: 'YTLC' 500, 'wdth' 100">Jurnal Eksplorasi</h1>
                    <svg class="absolute w-full h-3 -bottom-1 left-0 text-[#7ef4fc]" viewBox="0 0 400 12" preserveAspectRatio="none" fill="none">
                        <path d="M0 6 Q 100 11 200 6 Q 300 1 400 6" stroke="currentColor" stroke-width="4" fill="transparent"/>
                    </svg>
                </div>
                <p class="text-[#44474e] text-lg leading-7 max-w-2xl mt-4">
                    Temukan artikel menarik seputar sains, tips mendidik anak cerdas, dan laporan kegiatan eksperimen seru dari Amma Science Kids.
                </p>
            </div>
        </section>

        {{-- FEATURED ARTICLE --}}
        @if ($featuredArticle)
        <section class="max-w-7xl mx-auto px-6 md:px-12 py-8">
            <a href="{{ route('artikel.detail', $featuredArticle->slug) }}" class="group block bg-[#fbf8fc] border border-[rgba(29,32,55,0.76)] rounded-xl overflow-hidden shadow-md hover:shadow-xl transition duration-300">
                <div class="relative h-80 md:h-96">
                    @if ($featuredArticle->image)
                        <img src="{{ asset('storage/' . $featuredArticle->image) }}"
                             alt="{{ $featuredArticle->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" />
                    @else
                        <img src="{{ asset('img/Kids1.png') }}"
                             alt="{{ $featuredArticle->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" />
                    @endif
                    <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(3,22,54,0.92) 0%, rgba(3,22,54,0.45) 50%, transparent 100%)"></div>
                    <span class="absolute top-6 left-6 bg-[#7ef4fc] text-[#002022] text-xs font-bold px-3.5 py-1.5 rounded-full flex items-center gap-1.5 shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                        Sorotan Sains: {{ $featuredArticle->category?->name ?? 'Eksplorasi' }}
                    </span>
                    <div class="absolute bottom-0 left-0 right-0 md:right-1/4 p-6 md:p-10">
                        <div class="flex items-center gap-4 mb-3">
                            <span class="flex items-center gap-1 text-white/80 text-xs font-medium">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                {{ ($featuredArticle->published_at ?? $featuredArticle->created_at)->format('d M Y') }}
                            </span>
                            <span class="flex items-center gap-1 text-white/80 text-xs font-medium">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                5 Min Baca
                            </span>
                        </div>
                        <h2 class="font-display font-bold text-white text-2xl md:text-3xl lg:text-4xl leading-tight mb-3 group-hover:text-[#7ef4fc] transition"
                            style="font-variation-settings: 'YTLC' 500, 'wdth' 100">
                            {{ $featuredArticle->title }}
                        </h2>
                        <p class="text-white/90 text-sm md:text-base leading-relaxed line-clamp-2 max-w-2xl">
                            {{ Str::limit(strip_tags($featuredArticle->content), 160) }}
                        </p>
                    </div>
                </div>
            </a>
        </section>
        @endif

        {{-- CATEGORY FILTER --}}
        <section id="articleFilter" class="max-w-7xl mx-auto px-6 md:px-12 pt-6 pb-2">
            <div class="flex flex-wrap gap-3 items-center">
                @php
                    $isAll = ($selectedCategory === 'Semua Artikel') || (! $selectedCategory);
                @endphp
                @if ($isAll)
                    <a href="{{ route('artikel') }}"
                       class="px-5 py-2.5 rounded-full text-xs font-bold tracking-[0.05em] shadow-md transition"
                       style="background-color: #0c4185; color: #ffffff; border: 2px solid #0c4185;">
                        Semua Artikel
                    </a>
                @else
                    <a href="{{ route('artikel') }}"
                       class="px-5 py-2.5 rounded-full text-xs font-bold tracking-[0.05em] transition hover:shadow-sm"
                       style="background-color: #ffffff; color: #374151; border: 2px solid #e5e7eb;">
                        Semua Artikel
                    </a>
                @endif

                @foreach ($categories as $cat)
                    @php
                        $isActive = ($selectedCategory === $cat->slug || $selectedCategory === $cat->name);
                    @endphp
                    @if ($isActive)
                        <a href="{{ route('artikel', ['kategori' => $cat->slug]) }}"
                           class="px-5 py-2.5 rounded-full text-xs font-bold tracking-[0.05em] shadow-md transition"
                           style="background-color: #e95605; color: #ffffff; border: 2px solid #e95605;">
                            {{ $cat->name }}
                        </a>
                    @else
                        <a href="{{ route('artikel', ['kategori' => $cat->slug]) }}"
                           class="px-5 py-2.5 rounded-full text-xs font-bold tracking-[0.05em] transition hover:shadow-sm"
                           style="background-color: #ffffff; color: #374151; border: 2px solid #e5e7eb;">
                            {{ $cat->name }}
                        </a>
                    @endif
                @endforeach
            </div>
        </section>

        {{-- ARTICLE GRID --}}
        <section class="max-w-7xl mx-auto px-6 md:px-12 py-8">
            <div id="articleGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @php
                    $borderColors = ['#0c4185', '#6c26d5', '#2230ad', '#d88c0a', '#42b404', '#e95605'];
                @endphp

                @forelse ($articles as $index => $article)
                    @php
                        $bColor = $borderColors[$index % count($borderColors)];
                        $imgSrc = $article->image ? asset('storage/' . $article->image) : asset('img/Kids1.png');
                    @endphp
                    <div class="article-card bg-[#fbf8fc] border-4 rounded-xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-1 hover:shadow-md transition duration-200"
                         style="border-color: {{ $bColor }}">
                        <a href="{{ route('artikel.detail', $article->slug) }}" class="relative h-52 bg-[#f5f3f6] block overflow-hidden">
                            <img src="{{ $imgSrc }}"
                                 alt="{{ $article->title }}" class="w-full h-full object-cover hover:scale-105 transition duration-300" />
                            @if ($article->category)
                                <span class="absolute top-3 left-3 backdrop-blur-sm bg-[rgba(228,226,229,0.95)] text-[#031636] font-bold text-xs px-3 py-1 rounded-md shadow-sm">
                                    {{ $article->category->name }}
                                </span>
                            @endif
                        </a>
                        <div class="p-5 flex flex-col flex-1">
                            <div class="flex items-center justify-between text-xs text-[#44474e] mb-3">
                                <span class="flex items-center gap-1 font-medium">
                                    <svg class="w-3.5 h-3.5 text-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    {{ ($article->published_at ?? $article->created_at)->format('d M Y') }}
                                </span>
                                <span class="text-gray-400">3 Min</span>
                            </div>
                            <h3 class="font-display font-bold text-[#031636] text-xl mb-2 leading-snug hover:text-orange transition"
                                style="font-variation-settings: 'YTLC' 500, 'wdth' 100">
                                <a href="{{ route('artikel.detail', $article->slug) }}">{{ $article->title }}</a>
                            </h3>
                            <p class="text-[#44474e] text-sm leading-relaxed mb-4 flex-1 line-clamp-3">
                                {{ Str::limit(strip_tags($article->content), 110) }}
                            </p>
                            <a href="{{ route('artikel.detail', $article->slug) }}" class="flex items-center gap-1.5 text-[#003134] text-xs font-bold hover:text-orange transition hover:underline mt-auto">
                                Baca Selengkapnya
                                <svg class="w-2.5 h-2.5" viewBox="0 0 10 10" fill="none"><path d="M1 5h8M5.5 1.5 9 5l-3.5 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 px-6 text-center bg-white border-2 border-dashed border-gray-200 rounded-2xl flex flex-col items-center justify-center gap-3 shadow-sm">
                        <div class="w-16 h-16 rounded-full bg-blue-50 flex items-center justify-center text-3xl">📚</div>
                        <h3 class="font-display font-bold text-[#031636] text-2xl">Belum Ada Artikel</h3>
                        <p class="text-gray-600 text-sm max-w-md">
                            Belum ada artikel yang diterbitkan untuk kategori {{ $selectedCategory ?? 'ini' }}.
                        </p>
                        <a href="{{ route('artikel') }}" class="mt-3 inline-flex items-center gap-2 px-6 py-2.5 bg-[#0c4185] text-white text-sm font-bold rounded-full hover:bg-navy transition shadow-sm">
                            Tampilkan Semua Artikel
                        </a>
                    </div>
                @endforelse

            </div>

            {{-- Load More Section --}}
            <div id="loadMoreSection" class="flex flex-col items-center justify-center mt-12 gap-3">
                @if ($hasMore)
                    <button id="loadMoreBtn" onclick="loadMoreArticles()"
                            class="border-2 border-[#031636] text-[#031636] text-sm font-bold tracking-[0.05em] px-9 py-3.5 rounded-full flex items-center gap-2 hover:bg-[#031636] hover:text-white transition shadow-sm cursor-pointer">
                        <span id="loadMoreText">Muat Lebih Banyak</span>
                        <svg id="loadMoreIcon" class="w-3 h-2" viewBox="0 0 12 8" fill="none">
                            <path d="M1 1l5 5 5-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <p id="endOfArticlesNotice" class="hidden text-sm text-gray-500 font-medium py-2.5 px-6 bg-gray-50 rounded-full border border-gray-200 text-center">
                        ✨ Ini halaman terakhir — Semua artikel telah ditampilkan
                    </p>
                @elseif ($articles->isNotEmpty())
                    <p id="endOfArticlesNotice" class="text-sm text-gray-500 font-medium py-2.5 px-6 bg-gray-50 rounded-full border border-gray-200 text-center">
                        ✨ Ini halaman terakhir — Semua artikel telah ditampilkan
                    </p>
                @endif
            </div>
        </section>

    </main>

    <script>
        let currentArticlePage = {{ $articles->currentPage() }};
        let currentCategory = @json($selectedCategory ?? 'Semua Artikel');
        let isLoadingArticle = false;

        const borderPalette = ['#0c4185', '#6c26d5', '#2230ad', '#d88c0a', '#42b404', '#e95605'];

        document.addEventListener('DOMContentLoaded', function () {
            const filter = document.getElementById('articleFilter');
            if (!filter) return;

            filter.addEventListener('click', function (event) {
                const link = event.target.closest('a');
                if (!link) return;

                const href = link.getAttribute('href');
                if (!href || href.startsWith('#')) return;

                event.preventDefault();

                fetch(href, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'text/html'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const filterNode = doc.getElementById('articleFilter');
                    const grid = doc.getElementById('articleGrid');
                    const loadMore = doc.getElementById('loadMoreSection');

                    if (filterNode) {
                        document.getElementById('articleFilter').innerHTML = filterNode.innerHTML;
                    }

                    if (grid) {
                        document.getElementById('articleGrid').innerHTML = grid.innerHTML;
                    }

                    if (loadMore) {
                        document.getElementById('loadMoreSection').innerHTML = loadMore.innerHTML;
                    }

                    const url = new URL(href, window.location.origin);
                    currentCategory = url.searchParams.get('kategori') || 'Semua Artikel';
                    currentArticlePage = 1;
                });
            });
        });

        async function loadMoreArticles() {
            if (isLoadingArticle) return;

            const btn = document.getElementById('loadMoreBtn');
            const text = document.getElementById('loadMoreText');
            const notice = document.getElementById('endOfArticlesNotice');
            const grid = document.getElementById('articleGrid');

            isLoadingArticle = true;
            if (text) text.innerText = 'Memuat artikel...';

            try {
                const nextPage = currentArticlePage + 1;
                const response = await fetch(`{{ route('artikel') }}?kategori=${encodeURIComponent(currentCategory)}&page=${nextPage}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) throw new Error('Gagal memuat artikel');

                const data = await response.json();

                if (data.items && data.items.length > 0) {
                    data.items.forEach((item, index) => {
                        const card = createArticleCard(item, grid.children.length + index);
                        grid.appendChild(card);
                    });

                    currentArticlePage = data.current_page;
                }

                if (!data.has_more) {
                    if (btn) btn.style.display = 'none';
                    if (notice) notice.classList.remove('hidden');
                } else {
                    if (text) text.innerText = 'Muat Lebih Banyak';
                }
            } catch (err) {
                console.error(err);
                if (text) text.innerText = 'Coba Lagi';
            } finally {
                isLoadingArticle = false;
            }
        }

        function createArticleCard(item, index) {
            const bColor = borderPalette[index % borderPalette.length];
            const div = document.createElement('div');
            div.className = 'article-card bg-[#fbf8fc] border-4 rounded-xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-1 hover:shadow-md transition duration-200';
            div.style.borderColor = bColor;

            div.innerHTML = `
                <a href="${item.url}" class="relative h-52 bg-[#f5f3f6] block overflow-hidden">
                    <img src="${item.image}" alt="${escapeHtml(item.title)}" class="w-full h-full object-cover hover:scale-105 transition duration-300" />
                    <span class="absolute top-3 left-3 backdrop-blur-sm bg-[rgba(228,226,229,0.95)] text-[#031636] font-bold text-xs px-3 py-1 rounded-md shadow-sm">
                        ${escapeHtml(item.category_name)}
                    </span>
                </a>
                <div class="p-5 flex flex-col flex-1">
                    <div class="flex items-center justify-between text-xs text-[#44474e] mb-3">
                        <span class="flex items-center gap-1 font-medium">
                            <svg class="w-3.5 h-3.5 text-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            ${escapeHtml(item.date)}
                        </span>
                        <span class="text-gray-400">3 Min</span>
                    </div>
                    <h3 class="font-display font-bold text-[#031636] text-xl mb-2 leading-snug hover:text-orange transition"
                        style="font-variation-settings: 'YTLC' 500, 'wdth' 100">
                        <a href="${item.url}">${escapeHtml(item.title)}</a>
                    </h3>
                    <p class="text-[#44474e] text-sm leading-relaxed mb-4 flex-1 line-clamp-3">
                        ${escapeHtml(item.excerpt)}
                    </p>
                    <a href="${item.url}" class="flex items-center gap-1.5 text-[#003134] text-xs font-bold hover:text-orange transition hover:underline mt-auto">
                        Baca Selengkapnya
                        <svg class="w-2.5 h-2.5" viewBox="0 0 10 10" fill="none"><path d="M1 5h8M5.5 1.5 9 5l-3.5 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            `;
            return div;
        }

        function escapeHtml(str) {
            if (!str) return '';
            return String(str).replace(/[&<>"']/g, function(m) {
                return {'&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;'}[m];
            });
        }
    </script>

    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

</body>
</html>
