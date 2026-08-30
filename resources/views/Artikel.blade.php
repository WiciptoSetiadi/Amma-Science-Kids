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
                <img src="{{ asset('build/assets/IMG/Logo.png') }}"
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
        <section class="max-w-7xl mx-auto px-6 md:px-12 py-8">
            <div class="bg-[#fbf8fc] border border-[rgba(29,32,55,0.76)] rounded-xl overflow-hidden shadow-md">
                <div class="relative h-80 md:h-96">
                    <img src="https://www.figma.com/api/mcp/asset/ec3aff11-af10-470f-99e9-9c032296ff86.png"
                         alt="Featured Article" class="w-full h-full object-cover" />
                    <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(3,22,54,0.9) 0%, rgba(3,22,54,0.4) 50%, transparent 100%)"></div>
                    <span class="absolute top-6 left-6 bg-[#7ef4fc] text-[#002022] text-xs font-medium px-3 py-1 rounded-full flex items-center gap-1.5 shadow-sm">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                        Sorotan Sains
                    </span>
                    <div class="absolute bottom-0 left-0 right-1/4 p-8 md:p-10">
                        <div class="flex items-center gap-4 mb-3">
                            <span class="flex items-center gap-1 text-white/80 text-xs">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                12 Okt 2024
                            </span>
                            <span class="flex items-center gap-1 text-white/80 text-xs">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                5 Min Baca
                            </span>
                        </div>
                        <h2 class="font-display font-bold text-white text-2xl md:text-3xl leading-tight mb-3"
                            style="font-variation-settings: 'YTLC' 500, 'wdth' 100">
                            Mengapa Eksperimen Fisika Sederhana Sangat Penting untuk Perkembangan Kognitif Anak?
                        </h2>
                        <p class="text-white/90 text-base leading-6 hidden md:block">
                            Memahami konsep fisika dasar tidak perlu menggunakan alat laboratorium yang rumit. Dengan bahan sehari-hari, anak-anak dapat membangun intuisi saintifik yang kuat sejak dini.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- CATEGORY FILTER --}}
        <section class="max-w-7xl mx-auto px-6 md:px-12 pt-10 pb-2">
            <div class="flex flex-wrap gap-3">
                <button class="bg-[rgba(12,78,206,0.57)] text-[#313a50] text-xs font-medium px-5 py-2 rounded-full hover:opacity-90 transition">Semua Artikel</button>
                <button class="bg-[rgba(245,69,69,0.77)] border border-[rgba(25,37,141,0.3)] text-[#44474e] text-xs font-medium px-5 py-2 rounded-full hover:opacity-90 transition">Tips Orang Tua</button>
                <button class="bg-[rgba(207,200,63,0.71)] border border-[rgba(197,198,207,0.3)] text-[#44474e] text-xs font-medium px-5 py-2 rounded-full hover:opacity-90 transition">Eksperimen Seru</button>
                <button class="bg-[rgba(255,87,216,0.47)] border border-[rgba(197,198,207,0.3)] text-[#44474e] text-xs font-medium px-5 py-2 rounded-full hover:opacity-90 transition">Kisah Inspiratif</button>
                <button class="bg-[#5dee60] border border-[rgba(197,198,207,0.3)] text-[#44474e] text-xs font-medium px-5 py-2 rounded-full hover:opacity-90 transition">Info Program</button>
            </div>
        </section>

        {{-- ARTICLE GRID --}}
        <section class="max-w-7xl mx-auto px-6 md:px-12 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Card 1 --}}
                <div class="bg-[#fbf8fc] border-4 border-[#6c26d5] rounded-xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-0.5 transition duration-200">
                    <div class="relative h-52 bg-[#f5f3f6]">
                        <img src="https://www.figma.com/api/mcp/asset/9e59e8cb-3bdf-4022-ab51-0c9b1344f224.png"
                             alt="Pencampuran Warna" class="w-full h-full object-cover" />
                        <span class="absolute top-3 left-3 backdrop-blur-sm bg-[rgba(228,226,229,0.9)] text-[#031636] text-xs px-2.5 py-1 rounded-md shadow-sm">Eksperimen Seru</span>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <div class="flex items-center justify-between text-xs text-[#44474e] mb-3">
                            <span class="flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                08 Okt 2024
                            </span>
                            <span>3 Min</span>
                        </div>
                        <h3 class="font-display font-bold text-[#031636] text-xl mb-2 leading-tight"
                            style="font-variation-settings: 'YTLC' 500, 'wdth' 100">Keajaiban Warna: Belajar Pencampuran Warna Dasar</h3>
                        <p class="text-[#44474e] text-sm leading-5 mb-4 flex-1">Panduan langkah demi langkah untuk melakukan eksperimen pencampuran warna yang aman dan menyenangkan di rumah.</p>
                        <a href="#" class="flex items-center gap-1 text-[#003134] text-xs font-medium hover:underline">
                            Baca Selengkapnya
                            <svg class="w-2.5 h-2.5" viewBox="0 0 10 10" fill="none"><path d="M1 5h8M5.5 1.5 9 5l-3.5 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Card 2 --}}
                <div class="bg-[#fbf8fc] border-4 border-[rgba(34,48,173,0.78)] rounded-xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-0.5 transition duration-200">
                    <div class="relative h-52 bg-[#f5f3f6]">
                        <img src="https://www.figma.com/api/mcp/asset/910591e3-093e-4cc7-b01e-052aa2d1a34d.png"
                             alt="Tips Orang Tua" class="w-full h-full object-cover" />
                        <span class="absolute top-3 left-3 backdrop-blur-sm bg-[rgba(228,226,229,0.9)] text-[#031636] text-xs px-2.5 py-1 rounded-md shadow-sm">Tips Orang Tua</span>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <div class="flex items-center justify-between text-xs text-[#44474e] mb-3">
                            <span class="flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                05 Okt 2024
                            </span>
                            <span>4 Min</span>
                        </div>
                        <h3 class="font-display font-bold text-[#031636] text-xl mb-2 leading-tight"
                            style="font-variation-settings: 'YTLC' 500, 'wdth' 100">5 Cara Mudah Menjawab Pertanyaan "Mengapa?" dari Si Kecil</h3>
                        <p class="text-[#44474e] text-sm leading-5 mb-4 flex-1">Anak-anak secara alami memiliki rasa ingin tahu yang besar. Pelajari strategi komunikasi efektif untuk memuaskan rasa ingin tahu mereka.</p>
                        <a href="#" class="flex items-center gap-1 text-[#003134] text-xs font-medium hover:underline">
                            Baca Selengkapnya
                            <svg class="w-2.5 h-2.5" viewBox="0 0 10 10" fill="none"><path d="M1 5h8M5.5 1.5 9 5l-3.5 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Promo Card --}}
                <div class="bg-[#001b3d] rounded-2xl overflow-hidden flex flex-col justify-between p-8 relative shadow-md md:row-span-2">
                    <div class="absolute right-[-1rem] top-[-1rem] w-40 h-40 opacity-30 pointer-events-none">
                        <svg viewBox="0 0 160 160" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="80" cy="80" r="76" stroke="white" stroke-width="1.5" stroke-dasharray="6 4"/>
                            <circle cx="80" cy="80" r="50" stroke="white" stroke-width="1" stroke-dasharray="4 4"/>
                            <circle cx="80" cy="80" r="26" stroke="white" stroke-width="0.8"/>
                        </svg>
                    </div>
                    <div class="flex flex-col gap-4 pb-8 relative z-10">
                        <span class="bg-[#fd6c1a] text-white text-xs font-medium px-3 py-1 rounded-full self-start">Info Program</span>
                        <h3 class="font-bold text-white text-3xl leading-tight">
                            Pendaftaran Kelas Holiday Camp Musim Dingin Telah Dibuka!
                        </h3>
                        <p class="text-white/80 text-base leading-6">
                            Liburan sekolah akan segera tiba. Bergabunglah dengan program spesial kami selama dua minggu yang penuh dengan eksperimen bertema es dan salju. Kuota sangat terbatas.
                        </p>
                    </div>
                    <a href="#" class="bg-[#fd6c1a] hover:bg-[#e55a0a] text-white text-sm font-bold tracking-[0.05em] text-center py-3 rounded-lg transition relative z-10">
                        Daftar Sekarang
                    </a>
                </div>

                {{-- Card 4 --}}
                <div class="bg-[#fbf8fc] border-4 border-[#d88c0a] rounded-xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-0.5 transition duration-200">
                    <div class="relative h-52 bg-[#f5f3f6]">
                        <img src="https://www.figma.com/api/mcp/asset/a087bcb6-7fad-4090-8a40-f63b878d68a4.png"
                             alt="Festival Roket" class="w-full h-full object-cover" />
                        <span class="absolute top-3 left-3 backdrop-blur-sm bg-[rgba(228,226,229,0.9)] text-[#031636] text-xs px-2.5 py-1 rounded-md shadow-sm">Kisah Inspiratif</span>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <div class="flex items-center justify-between text-xs text-[#44474e] mb-3">
                            <span class="flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                28 Sep 2024
                            </span>
                            <span>6 Min</span>
                        </div>
                        <h3 class="font-display font-bold text-[#031636] text-xl mb-2 leading-tight"
                            style="font-variation-settings: 'YTLC' 500, 'wdth' 100">Laporan Lapangan: Festival Roket Air Amma Science 2024</h3>
                        <p class="text-[#44474e] text-sm leading-5 mb-4 flex-1">Lebih dari 50 ilmuwan cilik berpartisipasi dalam merancang, membangun, dan meluncurkan roket air mereka sendiri.</p>
                        <a href="#" class="flex items-center gap-1 text-[#003134] text-xs font-medium hover:underline">
                            Baca Selengkapnya
                            <svg class="w-2.5 h-2.5" viewBox="0 0 10 10" fill="none"><path d="M1 5h8M5.5 1.5 9 5l-3.5 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Card 5 --}}
                <div class="bg-[#fbf8fc] border-4 border-[#42b404] rounded-xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-0.5 transition duration-200">
                    <div class="relative h-52 bg-[#f5f3f6]">
                        <img src="https://www.figma.com/api/mcp/asset/06adc14f-f805-4c41-8246-1e25c66c2cc5.png"
                             alt="Struktur Daun" class="w-full h-full object-cover" />
                        <span class="absolute top-3 left-3 backdrop-blur-sm bg-[rgba(228,226,229,0.9)] text-[#031636] text-xs px-2.5 py-1 rounded-md shadow-sm">Eksperimen Seru</span>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <div class="flex items-center justify-between text-xs text-[#44474e] mb-3">
                            <span class="flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                20 Sep 2024
                            </span>
                            <span>4 Min</span>
                        </div>
                        <h3 class="font-display font-bold text-[#031636] text-xl mb-2 leading-tight"
                            style="font-variation-settings: 'YTLC' 500, 'wdth' 100">Mengamati Struktur Daun: Biologi Dasar di Halaman Rumah</h3>
                        <p class="text-[#44474e] text-sm leading-5 mb-4 flex-1">Ajak anak mengeksplorasi alam sekitar. Dengan bermodalkan kaca pembesar, halaman rumah bisa menjadi laboratorium.</p>
                        <a href="#" class="flex items-center gap-1 text-[#003134] text-xs font-medium hover:underline">
                            Baca Selengkapnya
                            <svg class="w-2.5 h-2.5" viewBox="0 0 10 10" fill="none"><path d="M1 5h8M5.5 1.5 9 5l-3.5 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>

            </div>

            {{-- Load More --}}
            <div class="flex justify-center mt-10">
                <button class="border-2 border-[#031636] text-[#031636] text-sm tracking-[0.05em] px-7 py-3.5 rounded-full flex items-center gap-2 hover:bg-[#031636] hover:text-white transition">
                    Muat Lebih Banyak
                    <svg class="w-3 h-2" viewBox="0 0 12 8" fill="none"><path d="M1 1l5 5 5-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
            </div>
        </section>

    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

</body>
</html>
