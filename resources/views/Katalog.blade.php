<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Program - Amma Science Kids</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-[#44474e]">

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
                <a href="/"       class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Beranda</a>
                <a href="/tentang" class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition leading-tight">Tentang<br>Kami</a>
                <a href="/program" class="px-3 py-2 rounded-lg text-[#fc6c29] tracking-[0.05em] transition">Program</a>
                <a href="/artikel" class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Artikel</a>
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

    {{-- PAGE HEADER --}}
    <section class="bg-[#aadaff] rounded-[2.5rem] mx-4 mt-6 overflow-hidden relative px-10 pt-20 pb-8">
        <div class="absolute inset-0 opacity-30" style="background: radial-gradient(ellipse at left top, rgba(3,22,54,0.08) 0%, transparent 60%)"></div>
        <div class="max-w-3xl mx-auto text-center relative z-10">
            <h1 class="font-display font-extrabold text-[#031636] text-4xl md:text-5xl tracking-tight mb-4"
                style="font-variation-settings: 'YTLC' 500, 'wdth' 100">
                Program AMMA Science Kids
            </h1>
            <p class="text-[#44474e] text-lg leading-7">
                Pengalaman belajar yang dapat diselenggarakan sesuai kebutuhan sekolah, keluarga, komunitas, dan masyarakat. Menumbuhkan fitrah keingintahuan anak melalui sains yang menyenangkan.
            </p>
        </div>
    </section>

    {{-- MAIN CONTENT --}}
    <main class="max-w-7xl mx-auto px-6 md:px-10 py-16 flex flex-col lg:flex-row gap-8">

        {{-- SIDEBAR FILTER FORM --}}
        <aside class="w-full lg:w-64 shrink-0 flex flex-col gap-4">
            <form id="filterForm" action="{{ route('program') }}" method="GET" class="flex flex-col gap-4">
                <input type="hidden" name="kategori" id="inputKategori" value="{{ $selectedCategory ?? 'Semua Program' }}">
                <input type="hidden" name="sort" id="inputSort" value="{{ $sort ?? 'terpopuler' }}">

                {{-- Search --}}
                <div class="relative border-[3px] border-black rounded-xl overflow-hidden bg-white shadow-sm">
                    <div class="absolute left-3 top-1/2 -translate-y-1/2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari program..."
                           class="w-full bg-[#fce8e8] text-gray-800 pl-9 pr-4 py-3 text-sm outline-none placeholder-gray-500 font-medium" />
                </div>

                {{-- Kategori --}}
                <div class="bg-white border border-black rounded-xl p-4 flex flex-col gap-3 shadow-sm">
                    <div class="flex items-center justify-between">
                        <h3 class="font-display font-bold text-[#a63b00] text-xl"
                            style="font-variation-settings: 'YTLC' 500, 'wdth' 100">Kategori</h3>
                        @if ($selectedCategory && $selectedCategory !== 'Semua Program')
                            <button type="button" onclick="selectCategory('Semua Program')" class="text-xs text-orange hover:underline">Reset</button>
                        @endif
                    </div>
                    <ul class="flex flex-col gap-2 text-sm">
                        @foreach ($categories as $cat)
                            @php
                                $isActive = ($selectedCategory === $cat) || (! $selectedCategory && $cat === 'Semua Program');
                            @endphp
                            <li onclick="selectCategory('{{ $cat }}')"
                                class="flex items-center gap-2 cursor-pointer p-1.5 rounded-lg hover:bg-orange/5 transition {{ $isActive ? 'font-bold' : '' }}">
                                @if ($isActive)
                                    <span class="w-4 h-4 rounded-full bg-[#a63b00] flex items-center justify-center shrink-0">
                                        <svg class="w-2.5 h-2.5 text-white" fill="currentColor" viewBox="0 0 10 10"><path d="M2 5l3 3 3-3"/></svg>
                                    </span>
                                    <span class="text-[#031636] tracking-[0.05em]">{{ $cat }}</span>
                                @else
                                    <span class="w-4 h-4 rounded-full border border-[#6b7280] bg-white shrink-0"></span>
                                    <span class="text-[#44474e] tracking-[0.05em]">{{ $cat }}</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Usia --}}
                <div class="bg-white border border-black rounded-xl p-4 flex flex-col gap-3 shadow-sm">
                    <div class="flex items-center justify-between">
                        <h3 class="font-display font-bold text-[#a63b00] text-xl"
                            style="font-variation-settings: 'YTLC' 500, 'wdth' 100">Cocok Untuk (Usia)</h3>
                        @if (! empty($selectedAges))
                            <a href="{{ route('program', array_merge(request()->except('usia'), ['kategori' => $selectedCategory])) }}" class="text-xs text-orange hover:underline">Hapus</a>
                        @endif
                    </div>
                    <ul class="flex flex-col gap-2 text-sm">
                        @foreach ($availableAges as $age)
                            @php
                                $isChecked = in_array($age, $selectedAges ?? []);
                            @endphp
                            <li class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="usia[]" value="{{ $age }}" id="age_{{ Str::slug($age) }}"
                                       {{ $isChecked ? 'checked' : '' }}
                                       onchange="submitAgeFilter(this)"
                                       class="w-4 h-4 rounded border-[#6b7280] text-[#a63b00] focus:ring-[#a63b00] cursor-pointer" />
                                <label for="age_{{ Str::slug($age) }}" class="text-[#44474e] cursor-pointer select-none">{{ $age }}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="w-full bg-orange hover:bg-orange-dark text-white font-bold py-2.5 px-4 rounded-xl text-sm transition shadow-sm">
                        Terapkan Filter
                    </button>
                    @if (request()->hasAny(['search', 'kategori', 'usia', 'sort']))
                        <a href="{{ route('program') }}" class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl text-sm transition text-center flex items-center justify-center">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </aside>

        {{-- PROGRAM GRID --}}
        <div class="flex-1 min-w-0 border border-[#e7e7e7] rounded-xl p-4 flex flex-col gap-4">
            {{-- Toolbar --}}
            <div id="programToolbar" class="flex flex-wrap items-center justify-between gap-4 pb-4 border-b border-[#c5c6cf]">
                <span id="programCount" class="text-[#44474e] text-sm">
                    Menampilkan <strong id="programCounter" class="text-[#031636]">{{ $programs->count() }}</strong> program unggulan
                    @if ($selectedCategory && $selectedCategory !== 'Semua Program')
                        dalam <span class="bg-orange/10 text-orange font-semibold px-2 py-0.5 rounded text-xs">{{ $selectedCategory }}</span>
                    @endif
                </span>
                <div class="flex items-center gap-2 text-sm">
                    <span class="text-[#44474e]">Urutkan:</span>
                    <select onchange="updateSort(this.value)" class="bg-white border border-[rgba(197,198,207,0.3)] text-[#031636] text-sm rounded-lg px-3 py-1.5 outline-none cursor-pointer">
                        <option value="terpopuler" {{ ($sort ?? '') === 'terpopuler' ? 'selected' : '' }}>Terpopuler</option>
                        <option value="terbaru" {{ ($sort ?? '') === 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                        <option value="harga-rendah" {{ ($sort ?? '') === 'harga-rendah' ? 'selected' : '' }}>Harga Terendah</option>
                        <option value="harga-tinggi" {{ ($sort ?? '') === 'harga-tinggi' ? 'selected' : '' }}>Harga Tertinggi</option>
                    </select>
                </div>
            </div>

            {{-- Cards Grid --}}
            <div id="programGrid" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">

                @php
                    $colors = ['#0c4185', '#293def', '#751664', '#fe6f6f', '#006b58', '#fc6c29'];
                @endphp

                @forelse ($programs as $index => $program)
                    @php
                        $borderColor = $colors[$index % count($colors)];
                    @endphp
                    <div class="bg-white border-4 rounded-xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-0.5 transition duration-200"
                         style="border-color: {{ $borderColor }}">
                        <div class="relative h-48 bg-[#f5f3f6]">
                            @if ($program->image)
                                <img src="{{ asset('storage/' . $program->image) }}"
                                     alt="{{ $program->title }}" class="w-full h-full object-cover" />
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-[#aadaff] to-[#0c4185] flex items-center justify-center relative overflow-hidden">
                                    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#fff 1.5px, transparent 1.5px); background-size: 16px 16px;"></div>
                                    <svg class="w-16 h-16 text-white/70 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                    </svg>
                                </div>
                            @endif
                            <span class="absolute top-3 left-3 bg-[#fc6c29] text-white text-xs font-semibold px-3 py-1 rounded-full shadow-sm">
                                {{ $program->category ?? 'Program Sains' }}
                            </span>
                        </div>
                        <div class="p-5 flex flex-col flex-1">
                            <h3 class="font-display font-bold text-[#031636] text-xl mb-2 leading-snug"
                                style="font-variation-settings: 'YTLC' 500, 'wdth' 100">{{ $program->title }}</h3>
                            <p class="text-[#44474e] text-sm leading-5 mb-4 flex-1">
                                {{ Str::limit($program->description, 110) }}
                            </p>
                            <div class="border-t border-[rgba(197,198,207,0.1)] pt-4 flex flex-col gap-2 text-xs text-[#44474e] mb-4">
                                @if ($program->target_age)
                                <div class="flex items-center gap-2">
                                    <svg class="w-3.5 h-3.5 text-orange shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    <span>{{ $program->target_age }}</span>
                                </div>
                                @endif
                                <div class="flex items-center gap-2 font-semibold text-[#031636]">
                                    <svg class="w-3.5 h-3.5 text-teal-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    @if ($program->price > 0)
                                        Rp {{ number_format((float) $program->price, 0, ',', '.') }}
                                    @else
                                        <span class="text-teal-700">Hubungi Kami</span>
                                    @endif
                                </div>
                            </div>
                            <a href="{{ route('kontak') }}" class="bg-[rgba(12,65,133,0.1)] border border-[#0c4185] text-[#031636] text-sm font-semibold tracking-[0.05em] text-center px-4 py-2.5 rounded-lg flex items-center justify-center gap-2 hover:bg-[#0c4185] hover:text-white transition">
                                Pesan Program Ini
                                <svg class="w-2.5 h-2.5" viewBox="0 0 10 10" fill="none"><path d="M1 5h8M5.5 1.5 9 5l-3.5 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 px-6 text-center bg-white border-2 border-dashed border-gray-200 rounded-2xl flex flex-col items-center justify-center gap-3 shadow-sm">
                        <div class="w-16 h-16 rounded-full bg-orange/10 flex items-center justify-center text-3xl">🧪</div>
                        <h3 class="font-display font-bold text-[#031636] text-2xl">Program Tidak Ditemukan</h3>
                        <p class="text-gray-600 text-sm max-w-md">
                            Tidak ada program sains yang sesuai dengan kriteria filter atau kata kunci pencarian Anda saat ini.
                        </p>
                        <a href="{{ route('program') }}" class="mt-3 inline-flex items-center gap-2 px-6 py-2.5 bg-orange text-white text-sm font-bold rounded-full hover:bg-orange-dark transition shadow-sm">
                            Reset Semua Filter
                        </a>
                    </div>
                @endforelse

            </div>
        </div>
    </main>

    <script>
        function submitFilterForm(form) {
            const formData = new FormData(form);
            const params = new URLSearchParams(formData);
            const formAction = form.getAttribute('action') || '{{ route('program') }}';

            fetch(formAction + '?' + params.toString(), {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'text/html'
                }
            })
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const grid = doc.getElementById('programGrid');
                const toolbar = doc.getElementById('programToolbar');
                const count = doc.getElementById('programCount');
                const newFilterForm = doc.getElementById('filterForm');

                if (grid) {
                    document.getElementById('programGrid').innerHTML = grid.innerHTML;
                }

                if (toolbar) {
                    document.getElementById('programToolbar').innerHTML = toolbar.innerHTML;
                }

                if (count) {
                    document.getElementById('programCount').innerHTML = count.innerHTML;
                }

                if (newFilterForm) {
                    const oldForm = document.getElementById('filterForm');
                    if (oldForm) {
                        oldForm.action = newFilterForm.getAttribute('action') || '{{ route('program') }}';
                        oldForm.method = newFilterForm.getAttribute('method') || 'GET';
                        oldForm.innerHTML = newFilterForm.innerHTML;
                    }
                }
            });
        }

        function selectCategory(cat) {
            const form = document.getElementById('filterForm');
            const k = document.getElementById('inputKategori');
            if (k) {
                k.value = cat;
            }
            submitFilterForm(form);
        }

        function updateSort(val) {
            const form = document.getElementById('filterForm');
            const s = document.getElementById('inputSort');
            if (s) {
                s.value = val;
            }
            submitFilterForm(form);
        }

        function submitAgeFilter(checkbox) {
            const form = checkbox.closest('form');
            if (form) {
                submitFilterForm(form);
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.addEventListener('submit', function (event) {
                if (event.target && event.target.id === 'filterForm') {
                    event.preventDefault();
                    submitFilterForm(event.target);
                }
            });

            document.addEventListener('change', function (event) {
                if (event.target && event.target.matches('input[type="checkbox"][name="usia[]"]')) {
                    const form = event.target.closest('form');
                    if (form && form.id === 'filterForm') {
                        event.preventDefault();
                        submitFilterForm(form);
                    }
                }
            });
        });
    </script>

    {{-- FOOTER --}}
    @include('partials.footer')

</body>
</html>
