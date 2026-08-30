<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontak - Amma Science Kids</title>
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
                <a href="/"        class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Beranda</a>
                <a href="/tentang" class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition leading-tight">Tentang<br>Kami</a>
                <a href="/program" class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Program</a>
                <a href="/artikel" class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Artikel</a>
                <a href="/galeri"  class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Galeri</a>
                <a href="/kontak"  class="px-3 py-2 rounded-lg text-[#fc6c29] tracking-[0.05em] transition">Kontak</a>
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

    <main>
        <section class="max-w-7xl mx-auto px-6 md:px-12 py-16">

            {{-- Hero Header --}}
            <div class="flex flex-col items-center text-center gap-4 mb-12 relative">
                <div class="absolute right-0 top-0 w-80 h-80 opacity-10 pointer-events-none">
                    <svg viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="200" cy="200" r="195" stroke="#031636" stroke-width="1.5" stroke-dasharray="8 5"/>
                        <circle cx="200" cy="200" r="130" stroke="#031636" stroke-width="1" stroke-dasharray="6 5"/>
                        <circle cx="200" cy="200" r="65" stroke="#031636" stroke-width="0.8"/>
                        <line x1="5" y1="200" x2="395" y2="200" stroke="#031636" stroke-width="0.8"/>
                        <line x1="200" y1="5" x2="200" y2="395" stroke="#031636" stroke-width="0.8"/>
                    </svg>
                </div>
                <h1 class="font-display font-extrabold text-[#031636] text-4xl md:text-5xl tracking-tight"
                    style="font-variation-settings: 'YTLC' 500, 'wdth' 100">Mari Terhubung</h1>
                <p class="text-[#44474e] text-lg leading-7 max-w-2xl">
                    Ada pertanyaan tentang program jurnal sains kami? Kami siap membantu rasa ingin tahu si kecil berkembang.
                </p>
            </div>

            {{-- Contact Card --}}
            <div class="bg-white border-[3px] border-black rounded-2xl overflow-hidden flex flex-col lg:flex-row shadow-sm">

                {{-- LEFT: Form --}}
                <div class="flex-1 p-8 md:p-10 border-b lg:border-b-0 lg:border-r border-[rgba(197,198,207,0.1)]">
                    <h2 class="font-display font-bold text-[#031636] text-3xl mb-6"
                        style="font-variation-settings: 'YTLC' 500, 'wdth' 100">Kirim Pesan</h2>

                    <form class="flex flex-col gap-4">
                        <div class="flex flex-col gap-2">
                            <label class="text-[#1b1b1e] text-xs font-medium">Nama Lengkap</label>
                            <input type="text" placeholder="Nama Anda atau Orang Tua"
                                   class="bg-[#fbf8fc] border-2 border-[#71ccd0] rounded-lg px-4 py-4 text-[#44474e] text-base outline-none focus:border-[#14B8A6] transition placeholder-[#44474e]/60" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-[#1b1b1e] text-xs font-medium">Email</label>
                            <input type="email" placeholder="contoh@email.com"
                                   class="bg-[#fbf8fc] border-2 border-[#71ccd0] rounded-lg px-4 py-4 text-[#44474e] text-base outline-none focus:border-[#14B8A6] transition placeholder-[#44474e]/60" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-[#1b1b1e] text-xs font-medium">Subjek</label>
                            <input type="text" placeholder="Pertanyaan tentang program"
                                   class="bg-[#fbf8fc] border-2 border-[#71ccd0] rounded-lg px-4 py-4 text-[#44474e] text-base outline-none focus:border-[#14B8A6] transition placeholder-[#44474e]/60" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-[#1b1b1e] text-xs font-medium">Pesan</label>
                            <textarea rows="5" placeholder="Tuliskan pesan Anda di sini..."
                                      class="bg-[#fbf8fc] border-2 border-[#71ccd0] rounded-lg px-4 py-4 text-[#44474e] text-base outline-none focus:border-[#14B8A6] transition resize-none placeholder-[#44474e]/60"></textarea>
                        </div>
                        <div class="pt-4">
                            <button type="submit"
                                    class="bg-[#4bc8ea] hover:bg-[#2bb5d8] text-black text-sm tracking-[0.05em] px-8 py-4 rounded-full flex items-center gap-2 transition font-medium">
                                Kirim Pesan
                                <svg class="w-3.5 h-3" viewBox="0 0 14 12" fill="none"><path d="M1 6h12M7 1l6 5-6 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </button>
                        </div>
                    </form>
                </div>

                {{-- RIGHT: Contact Info --}}
                <div class="bg-[#001b3d] w-full lg:w-[420px] shrink-0 p-10 flex flex-col justify-between relative overflow-hidden">
                    {{-- Decorative blur spots --}}
                    <div class="absolute -bottom-16 -left-12 w-48 h-48 bg-[#fd6c1a] opacity-10 rounded-full blur-2xl pointer-events-none"></div>
                    <div class="absolute -top-32 -right-20 w-64 h-64 bg-[#001f27] opacity-20 rounded-full blur-3xl pointer-events-none"></div>

                    <div class="flex flex-col gap-8 pb-10 relative z-10">
                        <h3 class="font-bold text-white text-2xl">Informasi Kontak</h3>

                        <ul class="flex flex-col gap-8">
                            {{-- Lokasi --}}
                            <li class="flex items-start gap-4">
                                <div class="bg-[rgba(73,95,132,0.2)] rounded-full w-12 h-12 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <p class="text-[#6f84ac] text-xs font-medium uppercase tracking-widest mb-1">Lokasi</p>
                                    <p class="text-white text-base leading-6">Surabaya, Jawa Timur</p>
                                </div>
                            </li>
                            {{-- Email --}}
                            <li class="flex items-start gap-4">
                                <div class="bg-[rgba(73,95,132,0.2)] rounded-full w-12 h-12 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <p class="text-[#6f84ac] text-xs font-medium uppercase tracking-widest mb-1">Email</p>
                                    <p class="text-white text-base leading-6">ammasciencekids@gmail.com</p>
                                </div>
                            </li>
                            {{-- Jam Operasional --}}
                            <li class="flex items-start gap-4">
                                <div class="bg-[rgba(73,95,132,0.2)] rounded-full w-12 h-12 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div>
                                    <p class="text-[#6f84ac] text-xs font-medium uppercase tracking-widest mb-1">Jam Operasional</p>
                                    <p class="text-white text-base leading-6">Selasa - Minggu: 09:00 - 15:00 WIB</p>
                                    <p class="text-white/80 text-base leading-6">Senin: Libur</p>
                                </div>
                            </li>
                        </ul>

                        {{-- WhatsApp Button --}}
                        <a href="https://wa.me/6285113242985" target="_blank" rel="noopener"
                           class="bg-[#25d366] hover:bg-[#1db954] text-white text-sm font-bold tracking-[0.05em] px-6 py-4 rounded-full flex items-center justify-center gap-3 shadow-md transition w-full">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            Hubungi Admin via WhatsApp
                        </a>
                    </div>

                    {{-- Map Placeholder --}}
                    <div class="border border-[rgba(177,199,242,0.2)] rounded-xl overflow-hidden relative h-48 z-10">
                        <img src="https://www.figma.com/api/mcp/asset/4710089b-ef17-476e-97ee-6b2fb5237efb.png"
                             alt="Peta Lokasi" class="w-full h-full object-cover opacity-80" />
                        <div class="absolute inset-0 bg-[rgba(0,27,61,0.1)]"></div>
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                            <span class="bg-white text-[#001b3d] text-xs font-medium px-3 py-1.5 rounded-full shadow-md flex items-center gap-1.5">
                                <svg class="w-3 h-3.5 text-[#e95605]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                                Amma Science Kids
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

</body>
</html>
