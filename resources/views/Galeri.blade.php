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
                <img src="{{ asset('build/assets/IMG/Logo.png') }}"
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
                <div class="flex flex-wrap justify-center gap-3 pt-2">
                    <button class="bg-[#006b58] border-2 border-[#006b58] text-white text-sm font-bold tracking-[0.05em] px-7 py-2.5 rounded-full shadow-sm">Semua</button>
                    <button class="bg-[#fbf9f1] border-2 border-[#00c9a7] text-[#00c9a7] text-sm font-bold tracking-[0.05em] px-7 py-2.5 rounded-full hover:bg-[#00c9a7] hover:text-white transition">Eksperimen</button>
                    <button class="bg-[#fbf9f1] border-2 border-[#ff9583] text-[#ac3323] text-sm font-bold tracking-[0.05em] px-7 py-2.5 rounded-full hover:bg-[#ff9583] hover:text-white transition">Workshop</button>
                    <button class="bg-[#fbf9f1] border-2 border-[#745ffb] text-[#52006b] text-sm font-bold tracking-[0.05em] px-7 py-2.5 rounded-full hover:bg-[#745ffb] hover:text-white transition">Science Festival</button>
                    <button class="bg-[#fbf9f1] border-2 border-[#ff061b] text-[#6b0000] text-sm font-bold tracking-[0.05em] px-7 py-2.5 rounded-full hover:bg-[#ff061b] hover:text-white transition">Roadshow</button>
                </div>
            </div>
        </section>

        {{-- GALLERY GRID --}}
        <section class="max-w-7xl mx-auto px-6 md:px-10 py-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- Card 1: Walkie Talkies --}}
                <div class="bg-[#fbf9f1] border-2 border-[#00c9a7] rounded-2xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-0.5 transition duration-200">
                    <div class="relative h-48 bg-[#e4e3db]">
                        <img src="https://www.figma.com/api/mcp/asset/067fdf7b-553f-496b-b885-bfedc02aa986.png"
                             alt="Membuat Walkie Talkies" class="w-full h-full object-cover" />
                        <span class="absolute top-4 left-4 bg-[#5ffbd6] text-[#002019] text-xs font-bold px-3 py-1 rounded-full shadow-sm">Eksperimen</span>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="font-semibold text-[#006b58] text-2xl mb-2 leading-tight">Membuat Cup Walkie Talkies</h3>
                        <p class="text-[#3c4a45] text-base leading-6">Anak-anak bereksperimen membuat alat bantu dengar dan komunikasi jarak jauh secara sederhana.</p>
                    </div>
                </div>

                {{-- Card 2: Outdoor Sensory --}}
                <div class="bg-[#fbf9f1] border-2 border-[#ff9583] rounded-2xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-0.5 transition duration-200">
                    <div class="relative h-48 bg-[#e4e3db]">
                        <img src="https://www.figma.com/api/mcp/asset/1e3838bf-44db-418c-bd45-c7747591ad59.png"
                             alt="Outdoor Sensory Play" class="w-full h-full object-cover" />
                        <span class="absolute top-4 left-4 bg-[#ff9583] text-[#87180c] text-xs font-bold px-3 py-1 rounded-full shadow-sm">Workshop</span>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="font-semibold text-[#ac3323] text-2xl mb-2 leading-tight">Outdoor Sensory Play</h3>
                        <p class="text-[#3c4a45] text-base leading-6">Bermain sambil belajar di alam terbuka dengan berbagai alat jelajah untuk menstimulasi panca indera.</p>
                    </div>
                </div>

                {{-- Card 3: Virtual Playdate --}}
                <div class="bg-[#fbf9f1] border-2 border-[#ffc72c] rounded-2xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-0.5 transition duration-200">
                    <div class="relative h-48 bg-[#e4e3db]">
                        <img src="https://www.figma.com/api/mcp/asset/4f8a227e-e1a9-430f-9050-5af43c028cd7.png"
                             alt="Virtual Playdate" class="w-full h-full object-cover" />
                        <span class="absolute top-4 left-4 bg-[#ffc72c] text-[#6f5400] text-xs font-bold px-3 py-1 rounded-full shadow-sm">Online</span>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="font-semibold text-[#775a00] text-2xl mb-2 leading-tight">Virtual Playdate</h3>
                        <p class="text-[#3c4a45] text-base leading-6">Keseruan belajar sains dari rumah melalui sesi interaktif yang dipandu oleh instruktur berpengalaman.</p>
                    </div>
                </div>

                {{-- Card 4: Sensory Obstacle --}}
                <div class="bg-[#fbf9f1] border-2 border-[#00c9a7] rounded-2xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-0.5 transition duration-200">
                    <div class="relative h-48 bg-[#e4e3db]">
                        <img src="https://www.figma.com/api/mcp/asset/27b63f4b-41a9-4f54-b246-3da8d57835c2.png"
                             alt="Sensory Obstacle Course" class="w-full h-full object-cover" />
                        <span class="absolute top-4 left-4 bg-[#5ffbd6] text-[#002019] text-xs font-bold px-3 py-1 rounded-full shadow-sm">Workshop</span>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="font-semibold text-[#006b58] text-2xl mb-2 leading-tight">Sensory Obstacle Course</h3>
                        <p class="text-[#3c4a45] text-base leading-6">Melatih motorik kasar dan ketangkasan anak melalui rintangan sensorik yang seru dan menantang.</p>
                    </div>
                </div>

                {{-- Card 5: Mystery Box --}}
                <div class="bg-[#fbf9f1] border-2 border-[#ff9583] rounded-2xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-0.5 transition duration-200">
                    <div class="relative h-48 bg-[#e4e3db]">
                        <img src="https://www.figma.com/api/mcp/asset/7e84a8db-89df-4e95-9bf5-37954d9ddcb3.png"
                             alt="Mystery Box Experiment" class="w-full h-full object-cover" />
                        <span class="absolute top-4 left-4 bg-[#ff9583] text-[#87180c] text-xs font-bold px-3 py-1 rounded-full shadow-sm">Eksperimen</span>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="font-semibold text-[#ac3323] text-2xl mb-2 leading-tight">Mystery Box Experiment</h3>
                        <p class="text-[#3c4a45] text-base leading-6">Menebak dan mengidentifikasi berbagai benda menarik yang tersembunyi di dalam kotak misteri.</p>
                    </div>
                </div>

                {{-- Card 6: Interactive Session --}}
                <div class="bg-[#fbf9f1] border-2 border-[#ffc72c] rounded-2xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-0.5 transition duration-200">
                    <div class="relative h-48 bg-[#e4e3db]">
                        <img src="https://www.figma.com/api/mcp/asset/902d8274-7ba7-4d8b-98c1-489805deeb80.png"
                             alt="Interactive Session" class="w-full h-full object-cover" />
                        <span class="absolute top-4 left-4 bg-[#ffc72c] text-[#6f5400] text-xs font-bold px-3 py-1 rounded-full shadow-sm">Online</span>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="font-semibold text-[#775a00] text-2xl mb-2 leading-tight">Interactive Session</h3>
                        <p class="text-[#3c4a45] text-base leading-6">Sesi tanya jawab dan demonstrasi sains virtual yang interaktif dan melibatkan partisipasi anak.</p>
                    </div>
                </div>

            </div>

            {{-- Load More --}}
            <div class="flex justify-center mt-12">
                <button class="bg-[#fbf9f1] border-2 border-[#6b7a75] text-[#1b1c17] text-sm font-bold tracking-[0.05em] px-9 py-3.5 rounded-full flex items-center gap-2 shadow-sm hover:bg-[#e8f5f2] transition">
                    Muat Lebih Banyak
                    <svg class="w-2.5 h-1.5" viewBox="0 0 10 6" fill="none"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
            </div>
        </section>

    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

</body>
</html>
