<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galeri Kegiatan - Amma Science Kids</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#fbf9f1] text-[#44474e]">

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
                <a href="/artikel" class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Artikel</a>
                <a href="/galeri"  class="px-3 py-2 rounded-lg text-[#fc6c29] tracking-[0.05em] transition">Galeri</a>
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

    <main class="bg-white overflow-hidden">

        {{-- HEADER SECTION --}}
        <section class="max-w-7xl mx-auto px-6 md:px-10 pt-12 pb-4">
            <div class="flex flex-col items-center text-center gap-4">
                {{-- Logo badge dari Figma --}}
                <img src="https://www.figma.com/api/mcp/asset/ed08bb98-ac9b-4d75-8508-42f553a13479.png"
                     alt="" class="h-28 w-auto object-contain" aria-hidden="true" />
                <h1 class="font-display font-bold text-[#006b58] text-4xl md:text-5xl tracking-tight"
                    style="font-variation-settings: 'YTLC' 500, 'wdth' 100">
                    Galeri Kegiatan
                </h1>
                <p class="text-[#3c4a45] text-lg leading-7 max-w-2xl font-medium">
                    Melihat keseruan anak-anak bereksplorasi, bereksperimen, dan menemukan keajaiban sains dalam berbagai kegiatan kami.
                </p>

                {{-- Filter Buttons --}}
                <div id="galleryFilter" class="flex flex-wrap justify-center gap-3 pt-2">
                    @php
                        $filterOptions = [
                            ['label' => 'Semua', 'color' => '#006b58', 'text' => '#006b58'],
                            ['label' => 'Eksperimen', 'color' => '#00c9a7', 'text' => '#00c9a7'],
                            ['label' => 'Workshop', 'color' => '#ff9583', 'text' => '#ac3323'],
                            ['label' => 'Science Festival', 'color' => '#745ffb', 'text' => '#52006b'],
                            ['label' => 'Roadshow', 'color' => '#ff061b', 'text' => '#6b0000'],
                        ];
                    @endphp

                    @foreach ($filterOptions as $filter)
                        @php
                            $isActive = ($selectedCategory === $filter['label']) || (! $selectedCategory && $filter['label'] === 'Semua');
                        @endphp
                        @if ($isActive)
                            <a href="{{ route('galeri', ['kategori' => $filter['label']]) }}"
                               class="border-2 text-white text-sm font-bold tracking-[0.05em] px-7 py-2.5 rounded-full shadow-md transition"
                               style="background-color: {{ $filter['color'] }}; border-color: {{ $filter['color'] }}">
                                {{ $filter['label'] }}
                            </a>
                        @else
                            <a href="{{ route('galeri', ['kategori' => $filter['label']]) }}"
                               class="bg-[#fbf9f1] border-2 text-sm font-bold tracking-[0.05em] px-7 py-2.5 rounded-full transition hover:text-white"
                               style="border-color: {{ $filter['color'] }}; color: {{ $filter['text'] }}"
                               onmouseover="this.style.backgroundColor='{{ $filter['color'] }}'; this.style.color='#fff'"
                               onmouseout="this.style.backgroundColor='#fbf9f1'; this.style.color='{{ $filter['text'] }}'">
                                {{ $filter['label'] }}
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>

        {{-- GALLERY GRID --}}
        <section class="max-w-7xl mx-auto px-6 md:px-10 py-10">
            <div id="galleryGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse ($galleries as $item)
                    @php
                        $badgeBg = match ($item->category) {
                            'Eksperimen' => '#00c9a7',
                            'Workshop' => '#ff9583',
                            'Science Festival' => '#745ffb',
                            'Roadshow' => '#ff061b',
                            default => '#5ffbd6',
                        };
                        $badgeText = match ($item->category) {
                            'Eksperimen' => '#002019',
                            'Workshop' => '#87180c',
                            'Science Festival' => '#ffffff',
                            'Roadshow' => '#ffffff',
                            default => '#002019',
                        };
                        $imageSrc = $item->image ? asset('storage/' . $item->image) : asset('img/Kids1.png');
                    @endphp
                    <div onclick="openGalleryModal('{{ addslashes($item->title) }}', '{{ $imageSrc }}', '{{ addslashes($item->category ?? 'Kegiatan') }}', '{{ addslashes($item->description ?? '') }}')"
                         class="gallery-item bg-[#fbf9f1] border-2 rounded-2xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-1 hover:shadow-md transition duration-200 cursor-pointer group"
                         style="border-color: {{ $badgeBg }}">
                        <div class="relative h-48 bg-[#e4e3db] overflow-hidden">
                            <img src="{{ $imageSrc }}"
                                 alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300" />
                            @if ($item->category)
                                <span class="absolute top-4 left-4 text-xs font-bold px-3 py-1 rounded-full shadow-sm"
                                      style="background-color: {{ $badgeBg }}; color: {{ $badgeText }}">
                                    {{ $item->category }}
                                </span>
                            @endif
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <h3 class="font-semibold text-2xl mb-2 leading-tight group-hover:text-[#fc6c29] transition"
                                style="color: {{ $badgeBg === '#00c9a7' ? '#006b58' : ($badgeBg === '#ff9583' ? '#ac3323' : '#031636') }}">
                                {{ $item->title }}
                            </h3>
                            <p class="text-[#3c4a45] text-base leading-6 line-clamp-3 mb-4">{{ $item->description }}</p>
                            <span class="mt-auto inline-flex items-center gap-1.5 text-xs font-bold text-[#006b58] group-hover:underline">
                                🔍 Lihat Detail Foto
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 px-6 text-center bg-white border-2 border-dashed border-gray-200 rounded-2xl flex flex-col items-center justify-center gap-3">
                        <div class="w-16 h-16 rounded-full bg-teal-50 flex items-center justify-center text-3xl">📸</div>
                        <h3 class="font-display font-bold text-[#006b58] text-2xl">Belum Ada Foto Kegiatan</h3>
                        <p class="text-gray-600 text-sm max-w-md">
                            Belum ada foto kegiatan yang diunggah untuk kategori {{ $selectedCategory ?? 'ini' }}.
                        </p>
                        <a href="{{ route('galeri') }}" class="mt-3 inline-flex items-center gap-2 px-6 py-2.5 bg-[#006b58] text-white text-sm font-bold rounded-full hover:bg-[#005243] transition shadow-sm">
                            Tampilkan Semua Galeri
                        </a>
                    </div>
                @endforelse

            </div>

            {{-- Load More Section --}}
            <div id="loadMoreSection" class="flex flex-col items-center justify-center mt-12 gap-3">
                @if ($hasMore)
                    <button id="loadMoreBtn" onclick="loadMoreGalleries()"
                            class="bg-[#fbf9f1] border-2 border-[#6b7a75] text-[#1b1c17] text-sm font-bold tracking-[0.05em] px-9 py-3.5 rounded-full flex items-center gap-2 shadow-sm hover:bg-[#e8f5f2] transition cursor-pointer">
                        <span id="loadMoreText">Muat Lebih Banyak</span>
                        <svg id="loadMoreIcon" class="w-2.5 h-1.5" viewBox="0 0 10 6" fill="none">
                            <path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <p id="endOfGalleryNotice" class="hidden text-sm text-gray-500 font-medium py-2.5 px-6 bg-gray-50 rounded-full border border-gray-200 text-center">
                        ✨ Ini halaman terakhir — Semua foto kegiatan telah ditampilkan
                    </p>
                @elseif ($galleries->isNotEmpty())
                    <p id="endOfGalleryNotice" class="text-sm text-gray-500 font-medium py-2.5 px-6 bg-gray-50 rounded-full border border-gray-200 text-center">
                        ✨ Ini halaman terakhir — Semua foto kegiatan telah ditampilkan
                    </p>
                @endif
            </div>
        </section>

    </main>

    {{-- GALLERY MODAL LIGHTBOX --}}
    <div id="galleryModal" class="fixed inset-0 z-50 hidden bg-black/80 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl overflow-hidden max-w-2xl w-full shadow-2xl relative">
            <button onclick="closeGalleryModal()" class="absolute top-4 right-4 z-10 bg-black/60 hover:bg-black text-white w-9 h-9 rounded-full flex items-center justify-center text-lg font-bold transition">
                ✕
            </button>
            <div class="relative h-72 md:h-96 bg-gray-100">
                <img id="modalImage" src="" alt="" class="w-full h-full object-cover" />
                <span id="modalCategory" class="absolute top-4 left-4 text-xs font-bold px-3.5 py-1.5 rounded-full shadow-sm bg-[#5ffbd6] text-[#002019]"></span>
            </div>
            <div class="p-6 md:p-8 bg-white">
                <h3 id="modalTitle" class="font-display font-bold text-[#006b58] text-2xl md:text-3xl mb-3"></h3>
                <p id="modalDescription" class="text-[#3c4a45] text-base leading-relaxed"></p>
            </div>
        </div>
    </div>

    <script>
        let currentGalleryPage = {{ $galleries->currentPage() }};
        let currentCategory = @json($selectedCategory ?? 'Semua');
        let isLoadingGallery = false;

        document.addEventListener('DOMContentLoaded', function () {
            const filter = document.getElementById('galleryFilter');
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
                    const filterNode = doc.getElementById('galleryFilter');
                    const grid = doc.getElementById('galleryGrid');
                    const loadMore = doc.getElementById('loadMoreSection');

                    if (filterNode) {
                        document.getElementById('galleryFilter').innerHTML = filterNode.innerHTML;
                    }

                    if (grid) {
                        document.getElementById('galleryGrid').innerHTML = grid.innerHTML;
                    }

                    if (loadMore) {
                        document.getElementById('loadMoreSection').innerHTML = loadMore.innerHTML;
                    }

                    const url = new URL(href, window.location.origin);
                    currentCategory = url.searchParams.get('kategori') || 'Semua';
                    currentGalleryPage = 1;
                });
            });
        });

        async function loadMoreGalleries() {
            if (isLoadingGallery) return;

            const btn = document.getElementById('loadMoreBtn');
            const text = document.getElementById('loadMoreText');
            const notice = document.getElementById('endOfGalleryNotice');
            const grid = document.getElementById('galleryGrid');

            isLoadingGallery = true;
            if (text) text.innerText = 'Memuat foto...';

            try {
                const nextPage = currentGalleryPage + 1;
                const response = await fetch(`{{ route('galeri') }}?kategori=${encodeURIComponent(currentCategory)}&page=${nextPage}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) throw new Error('Gagal mengambil data');

                const data = await response.json();

                if (data.items && data.items.length > 0) {
                    data.items.forEach(item => {
                        const card = createGalleryCard(item);
                        grid.appendChild(card);
                    });

                    currentGalleryPage = data.current_page;
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
                isLoadingGallery = false;
            }
        }

        function createGalleryCard(item) {
            let badgeBg = '#5ffbd6';
            let badgeText = '#002019';
            let titleColor = '#031636';

            if (item.category === 'Eksperimen') {
                badgeBg = '#00c9a7';
                badgeText = '#002019';
                titleColor = '#006b58';
            } else if (item.category === 'Workshop') {
                badgeBg = '#ff9583';
                badgeText = '#87180c';
                titleColor = '#ac3323';
            } else if (item.category === 'Science Festival') {
                badgeBg = '#745ffb';
                badgeText = '#ffffff';
                titleColor = '#52006b';
            } else if (item.category === 'Roadshow') {
                badgeBg = '#ff061b';
                badgeText = '#ffffff';
                titleColor = '#6b0000';
            }

            const div = document.createElement('div');
            div.className = 'gallery-item bg-[#fbf9f1] border-2 rounded-2xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-1 hover:shadow-md transition duration-200 cursor-pointer group';
            div.style.borderColor = badgeBg;
            div.onclick = function() {
                openGalleryModal(item.title, item.image, item.category, item.description);
            };

            div.innerHTML = `
                <div class="relative h-48 bg-[#e4e3db] overflow-hidden">
                    <img src="${item.image}" alt="${escapeHtml(item.title)}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300" />
                    <span class="absolute top-4 left-4 text-xs font-bold px-3 py-1 rounded-full shadow-sm" style="background-color: ${badgeBg}; color: ${badgeText}">
                        ${escapeHtml(item.category)}
                    </span>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <h3 class="font-semibold text-2xl mb-2 leading-tight group-hover:text-[#fc6c29] transition" style="color: ${titleColor}">
                        ${escapeHtml(item.title)}
                    </h3>
                    <p class="text-[#3c4a45] text-base leading-6 line-clamp-3 mb-4">${escapeHtml(item.description)}</p>
                    <span class="mt-auto inline-flex items-center gap-1.5 text-xs font-bold text-[#006b58] group-hover:underline">
                        🔍 Lihat Detail Foto
                    </span>
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

        function openGalleryModal(title, imageSrc, category, description) {
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('modalCategory').innerText = category || 'Kegiatan';
            document.getElementById('modalDescription').innerText = description || '';
            document.getElementById('galleryModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function closeGalleryModal() {
            document.getElementById('galleryModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        document.getElementById('galleryModal')?.addEventListener('click', function(e) {
            if (e.target === this) closeGalleryModal();
        });
    </script>

    {{-- FOOTER --}}
    @include('partials.footer')

</body>
</html>

