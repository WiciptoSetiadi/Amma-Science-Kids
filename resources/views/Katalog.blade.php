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
                <img src="{{ asset('build/assets/IMG/Logo.png') }}"
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

        {{-- SIDEBAR --}}
        <aside class="w-full lg:w-64 shrink-0 flex flex-col gap-4">
            {{-- Search --}}
            <div class="relative border-[3px] border-black rounded-xl overflow-hidden">
                <div class="absolute left-3 top-1/2 -translate-y-1/2">
                    <svg class="w-4 h-4 text-[#44474e]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input type="text" placeholder="Cari program..."
                       class="w-full bg-[rgba(235,88,88,0.94)] text-[#44474e] pl-9 pr-4 py-3 text-sm outline-none placeholder-[#44474e]" />
            </div>

            {{-- Kategori --}}
            <div class="bg-white border border-black rounded-xl p-4 flex flex-col gap-3 shadow-sm">
                <h3 class="font-display font-bold text-[#a63b00] text-xl"
                    style="font-variation-settings: 'YTLC' 500, 'wdth' 100">Kategori</h3>
                <ul class="flex flex-col gap-2 text-sm">
                    <li class="flex items-center gap-2">
                        <span class="w-4 h-4 rounded-full bg-[#a63b00] flex items-center justify-center shrink-0">
                            <svg class="w-2.5 h-2.5 text-white" fill="currentColor" viewBox="0 0 10 10"><path d="M2 5l3 3 3-3"/></svg>
                        </span>
                        <span class="text-[#031636] tracking-[0.05em]">Semua Program</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-4 h-4 rounded-full border border-[#6b7280] bg-white shrink-0"></span>
                        <span class="text-[#44474e] tracking-[0.05em]">Program Anak</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-4 h-4 rounded-full border border-[#6b7280] bg-white shrink-0"></span>
                        <span class="text-[#44474e] tracking-[0.05em]">Workshop Guru &amp; Ortu</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-4 h-4 rounded-full border border-[#6b7280] bg-white shrink-0"></span>
                        <span class="text-[#44474e] tracking-[0.05em]">Family Learning</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-4 h-4 rounded-full border border-[#6b7280] bg-white shrink-0"></span>
                        <span class="text-[#44474e] tracking-[0.05em]">Event Festival</span>
                    </li>
                </ul>
            </div>

            {{-- Usia --}}
            <div class="bg-white border border-black rounded-xl p-4 flex flex-col gap-3 shadow-sm">
                <h3 class="font-display font-bold text-[#a63b00] text-xl"
                    style="font-variation-settings: 'YTLC' 500, 'wdth' 100">Cocok Untuk (Usia)</h3>
                <ul class="flex flex-col gap-2 text-sm">
                    <li class="flex items-center gap-2">
                        <input type="checkbox" class="w-4 h-4 rounded border-[#6b7280]" />
                        <span class="text-[#44474e]">TK/RA</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <input type="checkbox" class="w-4 h-4 rounded border-[#6b7280]" />
                        <span class="text-[#44474e]">SD/MI</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <input type="checkbox" class="w-4 h-4 rounded border-[#6b7280]" />
                        <span class="text-[#44474e]">Homeschooling / PKBM</span>
                    </li>
                </ul>
            </div>
        </aside>

        {{-- PROGRAM GRID --}}
        <div class="flex-1 min-w-0 border border-[#e7e7e7] rounded-xl p-4 flex flex-col gap-4">
            {{-- Toolbar --}}
            <div class="flex items-center justify-between pb-4 border-b border-[#c5c6cf]">
                <span class="text-[#44474e] text-sm">Menampilkan 6 program unggulan</span>
                <div class="flex items-center gap-2 text-sm">
                    <span class="text-[#44474e]">Urutkan:</span>
                    <select class="bg-white border border-[rgba(197,198,207,0.3)] text-[#031636] text-sm rounded-lg px-3 py-1.5 outline-none">
                        <option>Terpopuler</option>
                        <option>Terbaru</option>
                    </select>
                </div>
            </div>

            {{-- Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">

                {{-- Card 1: Roadshow Sekolah --}}
                <div class="bg-white border-4 border-[#293def] rounded-xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-0.5 transition duration-200">
                    <div class="relative h-48 bg-[#f5f3f6]">
                        <img src="https://www.figma.com/api/mcp/asset/b71d45bf-55ef-4944-8f7f-706639de9b7d.png"
                             alt="Roadshow Sekolah" class="w-full h-full object-cover" />
                        <span class="absolute top-3 left-3 bg-[#7ef4fc] text-[#002022] text-xs font-medium px-3 py-1 rounded-full shadow-sm">Program Sekolah</span>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <h3 class="font-display font-bold text-[#031636] text-xl mb-2"
                            style="font-variation-settings: 'YTLC' 500, 'wdth' 100">Roadshow Sekolah</h3>
                        <p class="text-[#44474e] text-sm leading-5 mb-4 flex-1">
                            Menghadirkan pembelajaran interaktif langsung di lingkungan sekolah melalui eksperimen nyata.
                        </p>
                        <div class="border-t border-[rgba(197,198,207,0.1)] pt-4 flex flex-col gap-2 text-xs text-[#44474e] mb-4">
                            <div class="flex items-center gap-2">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                TK/RA, SD/MI
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Fleksibel (Sesuai kesepakatan)
                            </div>
                        </div>
                        <a href="#" class="bg-[rgba(59,117,231,0.46)] border border-black text-[#031636] text-sm tracking-[0.05em] text-center px-4 py-2.5 rounded-lg flex items-center justify-center gap-2 hover:bg-[rgba(59,117,231,0.65)] transition">
                            Lihat Detail
                            <svg class="w-2.5 h-2.5" viewBox="0 0 10 10" fill="none"><path d="M1 5h8M5.5 1.5 9 5l-3.5 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Card 2: Science Festival --}}
                <div class="bg-white border-4 border-[#751664] rounded-xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-0.5 transition duration-200">
                    <div class="relative h-48 bg-[#f5f3f6]">
                        <img src="https://www.figma.com/api/mcp/asset/cc7ec6f7-c25b-4b84-b761-5d9376bf31fd.png"
                             alt="Science Festival" class="w-full h-full object-cover" />
                        <span class="absolute top-3 left-3 bg-[#ffdbce] text-[#370e00] text-xs font-medium px-3 py-1 rounded-full shadow-sm">Event Besar</span>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <h3 class="font-display font-bold text-[#031636] text-xl mb-2"
                            style="font-variation-settings: 'YTLC' 500, 'wdth' 100">Science Festival</h3>
                        <p class="text-[#44474e] text-sm leading-5 mb-4 flex-1">
                            Festival edukasi meriah yang menggabungkan berbagai zona permainan, tantangan, dan Science Show.
                        </p>
                        <div class="border-t border-[rgba(197,198,207,0.1)] pt-4 flex flex-col gap-2 text-xs text-[#44474e] mb-4">
                            <div class="flex items-center gap-2">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                Umum &amp; Keluarga
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Event Tahunan / Custom
                            </div>
                        </div>
                        <a href="#" class="bg-[rgba(82,31,111,0.44)] border border-black text-[#031636] text-sm tracking-[0.05em] text-center px-4 py-2.5 rounded-lg flex items-center justify-center gap-2 hover:bg-[rgba(82,31,111,0.6)] transition">
                            Lihat Detail
                            <svg class="w-2.5 h-2.5" viewBox="0 0 10 10" fill="none"><path d="M1 5h8M5.5 1.5 9 5l-3.5 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Card 3: Family Learning --}}
                <div class="bg-white border-4 border-[#fe6f6f] rounded-xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-0.5 transition duration-200">
                    <div class="relative h-48 bg-[#f6f3f5]">
                        <img src="https://www.figma.com/api/mcp/asset/b6d72d45-f5ce-4e84-a8e0-dcb66d7f1a7b.png"
                             alt="Family Learning" class="w-full h-full object-cover" />
                        <span class="absolute top-3 left-3 bg-[#7ef4fc] text-[#002022] text-xs font-medium px-3 py-1 rounded-full shadow-sm">Keluarga</span>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <h3 class="font-display font-bold text-[#031636] text-xl mb-2"
                            style="font-variation-settings: 'YTLC' 500, 'wdth' 100">Family Learning Experience</h3>
                        <p class="text-[#44474e] text-sm leading-5 mb-4 flex-1">
                            Program yang mengajak orang tua dan anak belajar bersama melalui eksplorasi proyek keluarga.
                        </p>
                        <div class="border-t border-[rgba(197,198,207,0.1)] pt-4 flex flex-col gap-2 text-xs text-[#44474e] mb-4">
                            <div class="flex items-center gap-2">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                Anak &amp; Orang Tua
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                Di Rumah / Komunitas
                            </div>
                        </div>
                        <a href="#" class="bg-[rgba(120,128,38,0.35)] border border-black text-[#031636] text-sm tracking-[0.05em] text-center px-4 py-2.5 rounded-lg flex items-center justify-center gap-2 hover:bg-[rgba(120,128,38,0.5)] transition">
                            Lihat Detail
                            <svg class="w-2.5 h-2.5" viewBox="0 0 10 10" fill="none"><path d="M1 5h8M5.5 1.5 9 5l-3.5 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

</body>
</html>
