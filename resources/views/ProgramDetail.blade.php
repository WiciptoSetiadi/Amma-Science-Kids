<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
</div>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $program->title }} - Amma Science Kids</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#f8fbff] text-[#44474e] min-h-screen flex flex-col">
    <header class="sticky top-0 z-50 shadow-md bg-[#0c4185] border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 md:px-10 py-3.5 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0">
                <img src="{{ asset('img/Logo.png') }}" alt="Amma Science Kids Logo" class="h-12 w-12 object-contain rounded" />
                <span class="font-display font-bold text-white text-xl tracking-tight hidden sm:inline">Amma Science Kids</span>
            </a>
            <div class="flex items-center gap-3 sm:gap-5">
                <button type="button" class="lg:hidden flex h-11 w-11 items-center justify-center rounded-lg text-white transition hover:bg-white/10" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="mobile-navigation" data-mobile-menu-toggle>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                </button>
                <a href="{{ route('cart.index') }}" class="text-white hover:text-[#fc6c29] text-sm font-semibold transition">Keranjang</a>
                <a href="{{ route('program') }}" class="flex items-center gap-2 text-white hover:text-[#fc6c29] text-sm font-semibold tracking-wide transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                    <span>Katalog Program</span>
                </a>
            </div>
        </div>
        <nav id="mobile-navigation" class="hidden lg:hidden border-t border-white/10 px-6 py-3" aria-label="Navigasi mobile" data-mobile-menu>
            <div class="mx-auto flex max-w-7xl flex-col gap-1 text-sm font-medium">
                <a href="/" class="rounded-lg px-3 py-2 text-white hover:text-[#fc6c29]">Beranda</a>
                <a href="/tentang" class="rounded-lg px-3 py-2 text-white hover:text-[#fc6c29]">Tentang Kami</a>
                <a href="/program" class="rounded-lg px-3 py-2 text-white hover:text-[#fc6c29]">Program</a>
                <a href="/artikel" class="rounded-lg px-3 py-2 text-white hover:text-[#fc6c29]">Artikel</a>
                <a href="/galeri" class="rounded-lg px-3 py-2 text-white hover:text-[#fc6c29]">Galeri</a>
                <a href="/kontak" class="rounded-lg px-3 py-2 text-white hover:text-[#fc6c29]">Kontak</a>
            </div>
        </nav>
    </header>

    <main class="home-doodle flex-1 w-full">
        <div class="max-w-6xl mx-auto px-6 md:px-10 py-10 md:py-14">
            <a href="{{ route('program') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-[#0c4185] hover:text-[#e95605] transition mb-6">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Kembali ke katalog
            </a>

            @if (session('success'))
                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-800" role="status">
                    {{ session('success') }}
                </div>
            @endif

            <article class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <div class="min-h-[280px] lg:min-h-[480px] bg-[#f1f7fb]">
                        @if ($program->image)
                            <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}" class="w-full h-full min-h-[280px] lg:min-h-[480px] object-cover">
                        @else
                            <div class="w-full h-full min-h-[280px] lg:min-h-[480px] bg-gradient-to-br from-[#aadaff] to-[#0c4185] flex items-center justify-center relative overflow-hidden">
                                <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#fff 1.5px, transparent 1.5px); background-size: 16px 16px;"></div>
                                <svg class="w-28 h-28 text-white/75 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                            </div>
                        @endif
                    </div>

                    <div class="p-6 sm:p-9 lg:p-12 flex flex-col justify-center">
                        <span class="self-start bg-[#fc6c29]/10 text-[#a63b00] text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-full mb-5">
                            {{ $program->category ?: 'Program Sains' }}
                        </span>
                        <h1 class="font-display font-extrabold text-[#031636] text-3xl md:text-4xl leading-tight tracking-tight">
                            {{ $program->title }}
                        </h1>

                        @if ($program->target_age)
                            <p class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[#59606d]">
                                <svg class="w-5 h-5 text-[#0c4185]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                Cocok untuk {{ $program->target_age }}
                            </p>
                        @endif

                        <p class="mt-6 text-[#59606d] leading-7 whitespace-pre-line">
                            {{ $program->description ?: 'Informasi lengkap program ini akan segera tersedia.' }}
                        </p>

                        <div class="mt-8 pt-6 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5">
                            <div>
                                <p class="text-xs font-semibold text-[#7a8290] uppercase tracking-wider">Harga Program</p>
                                <p class="font-display font-extrabold text-[#031636] text-2xl mt-1">
                                    @if ($program->price > 0)
                                        Rp {{ number_format((float) $program->price, 0, ',', '.') }}
                                    @else
                                        Hubungi Kami
                                    @endif
                                </p>
                            </div>
                            <form action="{{ route('cart.add') }}" method="POST" class="w-full sm:w-auto">
                                @csrf
                                <input type="hidden" name="program_id" value="{{ $program->id }}">
                                <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#e95605] hover:bg-[#cc4a0f] text-white font-bold px-7 py-3.5 rounded-full transition shadow-sm">
                                    Pesan Program Ini
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </main>

    @include('partials.footer')
</body>
</html>
