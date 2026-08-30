<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Kami - Amma Science Kids</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-700 bg-doodle relative">

    {{-- =========================================
         NAVBAR
         bg blur, logo gambar, aktif = Tentang Kami
    ========================================= --}}
    <header class="sticky top-0 z-50 shadow-md border-b border-white/20"
            style="background: rgba(12,65,133,0.95); backdrop-filter: blur(6px);">
        <div class="max-w-7xl mx-auto px-6 md:px-10 py-3 flex items-center justify-between">

            {{-- Logo --}}
            <a href="/" class="flex items-center gap-3 shrink-0">
                <img src="{{ asset('build/assets/IMG/Logo.png') }}"
                     alt="Amma Science Kids Logo"
                     class="h-[56px] w-[56px] object-contain rounded" />
            </a>

            {{-- Nav Links --}}
        <nav class="hidden lg:flex items-center gap-8 font-medium text-sm">
            <a href="/" class="hover:text-orange transition">Beranda</a>
            <a href="/tentang" class="text-orange border-b-2 border-orange pb-1">Tentang Kami</a>
            <a href="/program" class="hover:text-orange transition">Program</a>
            <a href="/artikel" class="hover:text-orange transition">Artikel</a>
            <a href="/galeri" class="hover:text-orange transition">Galeri</a>
            <a href="/kontak" class="hover:text-orange transition">Kontak</a>
        </nav>

            {{-- Right Actions --}}
            <div class="flex items-center gap-4">
                <button class="flex items-center justify-center w-9 h-9 rounded-full text-white hover:text-[#fc6c29] transition"
                        aria-label="Keranjang">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </button>
                <a href="#"
                   class="hidden md:flex items-center justify-center px-4 py-2 text-sm text-white tracking-[0.05em] hover:text-[#fc6c29] transition">
                    Masuk
                </a>
                <a href="#"
                   class="bg-[#e95605] hover:bg-[#cc4a0f] text-white text-sm tracking-[0.05em] px-6 py-2.5 rounded-full font-medium transition shadow-sm leading-tight text-center">
                    Pesan<br>Sekarang
                </a>
            </div>
        </div>
    </header>


    {{-- =========================================
         MAIN CONTENT
    ========================================= --}}
    <main class="bg-white">

        {{-- =========================================
             HERO SECTION
             12-col grid, gambar miring, field note blob, quote box border-left
        ========================================= --}}
        <section class="max-w-7xl mx-auto px-6 md:px-10 pt-16 pb-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">

                {{-- Kiri: Teks --}}
                <div class="lg:col-span-5 flex flex-col gap-4 pt-2 relative z-10">

                    {{-- Heading --}}
                    <div class="flex flex-col items-start">
                        <h1 class="font-display font-bold text-[#1b1c17] text-4xl md:text-5xl tracking-tight leading-[1.15]">
                            Menumbuhkan Fitrah
                        </h1>
                        <div class="relative inline-block">
                            <span class="font-display font-bold text-[#00c9a7] text-4xl md:text-5xl tracking-tight leading-[1.15]">
                                Keingintahuan
                            </span>
                            {{-- Garis lengkung bawah --}}
                            <svg class="absolute w-full h-4 -bottom-1 left-0 text-[#a6fffe]"
                                 viewBox="0 0 200 16" preserveAspectRatio="none" fill="none">
                                <path d="M0 8 Q 50 14 100 8 Q 150 2 200 8"
                                      stroke="currentColor" stroke-width="5" fill="transparent"/>
                            </svg>
                        </div>
                        <h1 class="font-display font-bold text-[#1b1c17] text-4xl md:text-5xl tracking-tight leading-[1.15]">
                            Melalui Sains dan Nilai<br>Tauhid
                        </h1>
                    </div>

                    {{-- Badge Filosofi --}}
                    <div class="inline-flex items-center">
                        <span class="backdrop-blur-sm bg-[rgba(126,244,252,0.2)] border border-[rgba(126,244,252,0.3)] text-[#003134] text-xs font-normal px-3 py-1.5 rounded-full">
                            Filosofi Kami
                        </span>
                    </div>

                    {{-- Quote box � bg mint transparan + border kiri oranye --}}
                    <div class="bg-[rgba(95,251,214,0.48)] border-l-2 border-[#a63b00] pl-4 py-2">
                        <p class="text-[#44474e] text-base leading-7">
                            Kami percaya setiap anak lahir dengan rasa ingin tahu yang besar. Tugas kami adalah mengarahkan pandangan mereka pada kebesaran penciptaan alam semesta melalui eksperimen nyata yang bermakna.
                        </p>
                    </div>

                    {{-- CTA --}}
                    <div class="pt-4">
                        <a href="#program"
                           class="inline-flex items-center gap-2 bg-[#031636] hover:bg-[#1E2D4A] text-white text-sm tracking-[0.05em] px-6 py-3 rounded-full transition">
                            Jelajahi Program
                            <svg class="w-2.5 h-2.5" viewBox="0 0 10 10" fill="none">
                                <path d="M1 5h8M5.5 1.5 9 5l-3.5 3.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Tengah: Field Note (blob) --}}
                <div class="hidden lg:flex lg:col-span-2 items-center justify-center">
                    <div class="-rotate-3 relative max-w-[200px]">
                        {{-- Shadow blob --}}
                        <div class="absolute inset-0 translate-x-1 translate-y-2 blur-sm bg-gray-300/60 rounded-bl-2xl rounded-br-[7rem] rounded-tl-[8rem] rounded-tr-[8rem]"></div>
                        {{-- Card blob --}}
                        <div class="relative bg-[#fbf8fc] border border-[rgba(197,198,207,0.7)] p-4
                                    rounded-bl-2xl rounded-br-[7rem] rounded-tl-[8rem] rounded-tr-[8rem]
                                    flex flex-col gap-1">
                            {{-- Header --}}
                            <div class="flex items-center gap-2 text-[#75777f] text-xs">
                                <svg class="w-1.5 h-3 text-[#a63b00]" viewBox="0 0 6 12" fill="currentColor">
                                    <rect width="6" height="12" rx="3"/>
                                </svg>
                                Catatan Lapangan
                            </div>
                            {{-- Quote --}}
                            <p class="italic text-[#44474e] text-sm leading-5">
                                "Setiap daun menyimpan rahasia alam yang menunggu ditemukan."
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Kanan: Gambar miring --}}
                <div class="lg:col-span-3 flex items-center justify-center lg:col-start-10">
                    <div class="-rotate-[1.73deg] hover:rotate-0 transition duration-300 relative">
                        <img src="{{ asset('build/assets/IMG/Kids1.png') }}"
                             alt="Anak bereksplorasi di alam"
                             class="w-full max-w-[330px] h-[500px] md:h-[580px] object-cover rounded-xl
                                    border-[6px] border-[#b628cc] shadow-[10px_20px_6px_0px_rgba(0,0,0,0.25)]" />
                    </div>
                </div>
            </div>
        </section>


        {{-- =========================================
             KISAH AWAL MULA KAMI
             bg #a6fffe, drop-cap 55px, quote box border-left #7ef4fc
        ========================================= --}}
        <section class="border-t border-[rgba(197,198,207,0.1)]">
            <div class="max-w-7xl mx-auto px-6 md:px-10 pt-20 pb-16">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-12">

                    {{-- Kiri: Judul --}}
                    <div class="lg:col-span-3 flex flex-col gap-4 items-start">
                        <h2 class="font-display font-normal text-[#031636] text-3xl lg:text-4xl leading-[1.25]"
                            style="font-variation-settings: 'YTLC' 500, 'wdth' 100">
                            Kisah Awal<br>Mula Kami
                        </h2>
                        <svg class="w-7 h-7 text-[#031636]/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>

                    {{-- Kanan: Konten bg #a6fffe --}}
                    <div class="lg:col-span-9 relative">
                        <div class="bg-[#a6fffe] rounded-3xl overflow-hidden p-8 md:p-10
                                    grid grid-cols-1 md:grid-cols-2 gap-8">

                            {{-- Kolom kiri: paragraf dengan drop-cap --}}
                            <div class="text-[#44474e] leading-7 space-y-4 font-normal">
                                <p>
                                    <span class="float-left text-[55px] font-normal text-[#44474e] mr-3 leading-[0.8] pt-1 font-sans">B</span>
                                    erawal dari keprihatinan melihat anak-anak yang semakin jauh dari alam dan lebih banyak menghabiskan waktu di depan layar, sekelompok pendidik dan ilmuwan muslim berkumpul. Kami menyadari bahwa hilangnya interaksi dengan alam sejalan dengan memudarnya kekaguman pada Sang Pencipta.
                                </p>
                                <p>
                                    Amma Science Kids lahir bukan sekadar sebagai tempat kursus sains, melainkan sebagai wadah <strong class="text-[#031636]">Experiential Learning</strong>. Kami memadukan pendekatan metode ilmiah (Scientific Method) yang ketat dengan nilai-nilai spiritual yang mendalam, menciptakan harmoni antara akal dan hati.
                                </p>
                            </div>

                            {{-- Kolom kanan: teks lanjutan + quote --}}
                            <div class="space-y-6">
                                <p class="text-[#44474e] leading-7 font-normal">
                                    Ruang kelas kami bukanlah ruangan bersekat tembok, melainkan kebun, sungai, dan halaman yang luas. Peralatan kami bukan sekadar tabung reaksi, melainkan dedaunan, tanah, dan serangga. Melalui sentuhan langsung, anak-anak belajar mengobservasi, membuat hipotesis, dan menarik kesimpulan.
                                </p>

                                {{-- Quote box � bg #f5f3f6 + border-left #7ef4fc --}}
                                <div class="bg-[#f5f3f6] border-l-4 border-[#7ef4fc] rounded-xl pl-7 pr-6 py-6 relative">
                                    <div class="absolute top-4 right-4 w-8 h-6 opacity-20">
                                        <svg viewBox="0 0 34 24" fill="#031636" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                        </svg>
                                    </div>
                                    <p class="italic text-[#031636] text-base leading-6 relative z-10 pr-6">
                                        "Misi kami adalah mengembalikan percikan rasa ingin tahu alami anak-anak, mengubah 'Apa ini?' menjadi 'Masya Allah, betapa sempurnanya ciptaan ini'."
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- =========================================
             EMPAT PILAR PEMBELAJARAN
             Bento grid layout, warna & border baru, dekorasi corner, teks diperbarui
        ========================================= --}}
        <section class="max-w-7xl mx-auto px-6 md:px-10 py-20">
            <div class="flex flex-col gap-16 items-start">

                {{-- Header --}}
                <div class="flex flex-col gap-4 items-center w-full">
                    <h2 class="font-display font-normal text-[#031636] text-3xl md:text-4xl text-center"
                        style="font-variation-settings: 'YTLC' 500, 'wdth' 100">
                        Empat Pilar Pembelajaran
                    </h2>
                    <p class="text-[#44474e] text-base text-center max-w-xl leading-6">
                        Fondasi kami dalam mendesain setiap eksperimen dan kurikulum untuk memastikan pengalaman belajar yang holistik.
                    </p>
                </div>

                {{-- Bento Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 w-full">

                    {{-- Pilar 1: Eksplorasi � bg #66f461, border #046341 --}}
                    <div class="relative overflow-hidden bg-[#66f461] border-[3px] border-[#046341] rounded-2xl p-7
                                shadow-sm hover:-translate-y-1 transition duration-300">
                        <div class="mb-4">
                            <div class="bg-[rgba(255,219,206,0.5)] rounded-full w-12 h-12 flex items-center justify-center mb-0">
                                <svg class="w-5 h-5 text-[#031636]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="font-display font-normal text-[#031636] text-xl mb-3"
                            style="font-variation-settings: 'YTLC' 500, 'wdth' 100">
                            Eksplorasi
                        </h3>
                        <p class="text-[#44474e] text-sm leading-5">
                            Mendorong anak untuk berani bertanya, menyentuh, dan menyelidiki lingkungan sekitar tanpa rasa takut salah.
                        </p>
                    </div>

                    {{-- Pilar 2: Eksperimen � bg #e5a6fa, border rgba(186,18,223,0.82) --}}
                    <div class="relative overflow-hidden bg-[#e5a6fa] border-[3px] border-[rgba(186,18,223,0.82)] rounded-2xl p-7
                                shadow-sm hover:-translate-y-1 transition duration-300">
                        <div class="mb-4">
                            <div class="bg-[rgba(94,216,224,0.2)] rounded-full w-12 h-12 flex items-center justify-center">
                                <svg class="w-4 h-4 text-[#031636]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="font-display font-normal text-[#031636] text-xl mb-3"
                            style="font-variation-settings: 'YTLC' 500, 'wdth' 100">
                            Eksperimen
                        </h3>
                        <p class="text-[#44474e] text-sm leading-5">
                            Menguji hipotesis melalui percobaan langsung, mengajarkan metode ilmiah dan pemikiran kritis yang terstruktur.
                        </p>
                    </div>

                    {{-- Pilar 3: Kreativitas � bg #ff7a7a, border #af1217 --}}
                    <div class="relative overflow-hidden bg-[#ff7a7a] border-[3px] border-[#af1217] rounded-2xl p-7
                                shadow-sm hover:-translate-y-1 transition duration-300">
                        <div class="mb-4">
                            <div class="bg-[#d8e2ff] rounded-full w-12 h-12 flex items-center justify-center">
                                <svg class="w-4 h-5 text-[#031636]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="font-display font-normal text-[#031636] text-xl mb-3"
                            style="font-variation-settings: 'YTLC' 500, 'wdth' 100">
                            Kreativitas
                        </h3>
                        <p class="text-[#44474e] text-sm leading-5">
                            Mencari solusi inovatif dari bahan-bahan sederhana sehari-hari, membuktikan bahwa sains ada di mana-mana.
                        </p>
                    </div>

                    {{-- Pilar 4: Tauhid � bg #345593, border #0a1e46 --}}
                    <div class="relative overflow-hidden bg-[#345593] border-[3px] border-[#0a1e46] rounded-2xl p-7
                                shadow-sm hover:-translate-y-1 transition duration-300">
                        <div class="mb-4">
                            <div class="bg-[rgba(182,198,240,0.2)] border border-[rgba(216,226,255,0.3)] rounded-full w-12 h-12 flex items-center justify-center">
                                <svg class="w-5 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="font-display font-normal text-white text-xl mb-3"
                            style="font-variation-settings: 'YTLC' 500, 'wdth' 100">
                            Tauhid
                        </h3>
                        <p class="text-[#b6c6f0] text-sm leading-5">
                            Muaranya adalah menyadari keteraturan alam semesta sebagai bukti kekuasaan Sang Maha Pencipta, memupuk rasa syukur.
                        </p>
                    </div>

                </div>
            </div>
        </section>


        {{-- =========================================
             TIM EDUKATOR KAMI
             aspect-[4/5], border colors baru, rounded-[12px]
        ========================================= --}}
        <section class="max-w-7xl mx-auto px-6 md:px-10 pb-20 pt-4">
            <div class="flex flex-col gap-12">

                {{-- Header --}}
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                    <div class="max-w-2xl flex flex-col gap-4">
                        <h2 class="font-display font-normal text-[#031636] text-3xl md:text-4xl"
                            style="font-variation-settings: 'YTLC' 500, 'wdth' 100">
                            Tim Edukator Kami
                        </h2>
                        <p class="text-[#44474e] text-base leading-6">
                            Lebih dari sekadar pengajar, mereka adalah fasilitator keajaiban. Para ilmuwan dan pendidik yang mendedikasikan diri untuk membimbing anak-anak menelusuri fenomena alam.
                        </p>
                    </div>
                    <a href="#"
                       class="flex items-center gap-2 text-[#003134] text-sm tracking-[0.05em] hover:opacity-70 transition whitespace-nowrap shrink-0">
                        Lihat Semua Profil
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>

                {{-- Kartu Edukator --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    {{-- Card 1 � border rgba(1,23,218,0.79) --}}
                    <div class="flex flex-col gap-2">
                        <div class="aspect-[4/5] bg-[#f5f3f6] border-4 border-[rgba(1,23,218,0.79)] rounded-xl"></div>
                        <div class="flex flex-col gap-0.5 px-1">
                            <h4 class="font-display font-normal text-[#031636] text-xl leading-7"
                                style="font-variation-settings: 'YTLC' 500, 'wdth' 100">
                                Ustazah
                            </h4>
                        </div>
                    </div>

                    {{-- Card 2 � border #fac234 --}}
                    <div class="flex flex-col gap-2">
                        <div class="aspect-[4/5] bg-[#f5f3f6] border-4 border-[#fac234] rounded-xl -translate-x-1"></div>
                        <div class="flex flex-col gap-0.5 px-1">
                            <h4 class="font-display font-normal text-[#031636] text-xl leading-7"
                                style="font-variation-settings: 'YTLC' 500, 'wdth' 100">
                                Ustadz
                            </h4>
                        </div>
                    </div>

                    {{-- Card 3 � border #98162c --}}
                    <div class="flex flex-col gap-2">
                        <div class="aspect-[4/5] bg-[#f5f3f6] border-4 border-[#98162c] rounded-xl"></div>
                        <div class="flex flex-col gap-0.5 px-1">
                            <h4 class="font-display font-normal text-[#031636] text-xl leading-7"
                                style="font-variation-settings: 'YTLC' 500, 'wdth' 100">
                                Ustazah
                            </h4>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        {{-- =========================================
             CTA SECTION
             bg #1a2b4c, button #a63b00, motif SVG background
        ========================================= --}}
        <section class="max-w-7xl mx-auto px-6 md:px-10 pb-24">
            <div class="bg-[#1a2b4c] rounded-3xl p-12 md:p-16 flex flex-col md:flex-row items-center justify-between gap-8 relative overflow-hidden">

                {{-- Motif dekorasi background kanan atas --}}
                <div class="absolute right-[-64px] top-[-64px] w-64 h-64 opacity-20 pointer-events-none">
                    <svg viewBox="0 0 256 256" fill="none" stroke="white" stroke-width="1.5"
                         xmlns="http://www.w3.org/2000/svg">
                        <circle cx="128" cy="128" r="120"/>
                        <circle cx="128" cy="128" r="80"/>
                        <circle cx="128" cy="128" r="40"/>
                        <line x1="8" y1="128" x2="248" y2="128"/>
                        <line x1="128" y1="8" x2="128" y2="248"/>
                        <ellipse cx="128" cy="128" rx="120" ry="48"/>
                        <ellipse cx="128" cy="128" rx="48" ry="120"/>
                    </svg>
                </div>

                {{-- Teks --}}
                <div class="relative z-10 max-w-xl text-center md:text-left flex flex-col gap-4">
                    <h2 class="font-display font-normal text-white text-3xl md:text-4xl"
                        style="font-variation-settings: 'YTLC' 500, 'wdth' 100">
                        Mari Bereksplorasi Bersama Kami
                    </h2>
                    <p class="text-[#b6c6f0] text-base leading-6">
                        Jadwalkan kunjungan trial atau lihat daftar kelas reguler kami. Berikan pengalaman belajar sains yang berkesan dan bermakna untuk buah hati Anda.
                    </p>
                </div>

                {{-- Button --}}
                <div class="relative z-10 shrink-0">
                    <a href="#"
                       class="bg-[#a63b00] hover:bg-[#8a3000] text-white text-sm tracking-[0.05em] px-8 py-4 rounded-full font-normal transition
                              shadow-[0px_4px_10px_rgba(26,43,76,0.15)]">
                        Daftar Kelas Trial
                    </a>
                </div>
            </div>
        </section>

    </main>


    {{-- FOOTER --}}
    @include('partials.footer')

</body>
</html>
