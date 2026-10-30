<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout - Amma Science Kids</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#f8fbff] text-[#44474e] min-h-screen flex flex-col justify-between">

    {{-- TOP NAVBAR --}}
    <header class="sticky top-0 z-50 shadow-md bg-[#0c4185] border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 md:px-10 py-3.5 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 shrink-0">
                <img src="{{ asset('img/Logo.png') }}"
                     alt="Amma Science Kids Logo"
                     class="h-12 w-12 object-contain rounded" />
                <span class="font-display font-bold text-white text-xl tracking-tight hidden sm:inline">
                    Amma Science Kids
                </span>
            </a>

            <div class="flex items-center gap-3">
                <button type="button" class="lg:hidden flex h-11 w-11 items-center justify-center rounded-lg text-white transition hover:bg-white/10" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="mobile-navigation" data-mobile-menu-toggle>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <a href="{{ route('cart.index') }}" class="flex items-center gap-2 text-white hover:text-[#fc6c29] text-sm font-semibold tracking-wide transition">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Kembali</span>
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

    {{-- MAIN CONTAINER --}}
    <main class="home-doodle max-w-7xl mx-auto px-6 md:px-10 py-10 flex-1 w-full relative">

        {{-- Page Title --}}
        <div class="mb-8">
            <h1 class="font-display font-extrabold text-[#031636] text-3xl md:text-4xl tracking-tight">
                Checkout
            </h1>
            <p class="text-[#59606d] text-sm md:text-base mt-2">
                Selesaikan pesanan Anda. Kami akan menghubungi Anda melalui WhatsApp untuk konfirmasi.
            </p>
        </div>

        {{-- ERROR ALERT IF VALIDATION FAILS --}}
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl mb-8 shadow-sm text-sm">
                <div class="font-bold mb-1 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Mohon lengkapi formulir dengan benar:
                </div>
                <ul class="list-disc list-inside space-y-0.5 text-xs text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('checkout.store') }}" method="POST" id="checkoutForm">
            @csrf
            
            <div class="flex flex-col lg:flex-row items-start gap-8 w-full">
                
                {{-- LEFT COLUMN: DETAIL PEMESAN --}}
                <div class="w-full lg:flex-1 bg-white rounded-3xl border border-gray-200/90 p-6 sm:p-8 shadow-sm flex flex-col gap-6">
                    
                    {{-- Form Header --}}
                    <div class="flex items-center gap-3 border-b border-gray-100 pb-4">
                        <div class="w-10 h-10 rounded-xl bg-[#e0f2fe] text-[#0c4185] flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h2 class="font-display font-bold text-[#031636] text-xl">Detail Pemesan</h2>
                    </div>

                    {{-- Nama Lengkap --}}
                    <div class="flex flex-col gap-2">
                        <label for="customer_name" class="text-sm font-semibold text-[#031636]">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               id="customer_name"
                               name="customer_name"
                               required
                               value="{{ old('customer_name', $user->name ?? '') }}"
                               placeholder="Masukkan nama lengkap anak/orang tua"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-[#f8fafc] text-sm text-[#031636] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#0c4185] focus:border-transparent transition">
                    </div>

                    {{-- WhatsApp & Email Row --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        
                        {{-- Nomor WhatsApp --}}
                        <div class="flex flex-col gap-2">
                            <label for="customer_phone" class="text-sm font-semibold text-[#031636]">
                                Nomor WhatsApp <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <input type="text"
                                       id="customer_phone"
                                       name="customer_phone"
                                       required
                                       value="{{ old('customer_phone', $user->whatsapp_number ?? '') }}"
                                       placeholder="08123456789"
                                       class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-300 bg-[#f8fafc] text-sm text-[#031636] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#0c4185] focus:border-transparent transition">
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="flex flex-col gap-2">
                            <label for="customer_email" class="text-sm font-semibold text-[#031636]">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input type="email"
                                       id="customer_email"
                                       name="customer_email"
                                       required
                                       value="{{ old('customer_email', $user->email ?? '') }}"
                                       placeholder="email@contoh.com"
                                       class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-300 bg-[#f8fafc] text-sm text-[#031636] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#0c4185] focus:border-transparent transition">
                            </div>
                        </div>

                    </div>

                    {{-- Catatan Khusus --}}
                    <div class="flex flex-col gap-2">
                        <label for="notes" class="text-sm font-semibold text-[#031636]">
                            Catatan Khusus (Opsional)
                        </label>
                        <textarea id="notes"
                                  name="notes"
                                  rows="3"
                                  placeholder="Misal: Alergi bahan tertentu, usia anak, preferensi jadwal, dll."
                                  class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-[#f8fafc] text-sm text-[#031636] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#0c4185] focus:border-transparent transition resize-none">{{ old('notes') }}</textarea>
                    </div>

                </div>

                {{-- RIGHT COLUMN: RINGKASAN PESANAN --}}
                <div class="w-full lg:w-[400px] shrink-0 sticky top-24">
                    <div class="bg-white rounded-3xl border border-gray-200/90 shadow-sm overflow-hidden flex flex-col">
                        
                        {{-- Top lilac/purple container with cart items --}}
                        <div class="bg-[#f5d0fe]/60 p-6 border-b border-purple-200/60 flex flex-col gap-4">
                            <div class="flex items-center gap-2.5 text-[#031636]">
                                <svg class="w-5 h-5 text-[#031636]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <h3 class="font-display font-bold text-lg">Ringkasan Pesanan</h3>
                            </div>

                            {{-- Items list --}}
                            <div class="flex flex-col gap-3.5 divide-y divide-purple-200/40">
                                @foreach ($cart as $item)
                                    <div class="pt-3 first:pt-0 flex items-center gap-3">
                                        <div class="w-12 h-12 rounded-lg overflow-hidden shrink-0 bg-white border border-purple-200 flex items-center justify-center">
                                            @if (!empty($item['image']))
                                                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full bg-gradient-to-br from-[#aadaff] to-[#0c4185] flex items-center justify-center text-white">
                                                    <svg class="w-6 h-6 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-sm font-bold text-[#031636] truncate">{{ $item['title'] }}</h4>
                                            <p class="text-xs text-[#6b21a8] font-medium">Kategori: {{ $item['category'] ?? 'Sains' }}</p>
                                            <div class="flex items-center justify-between mt-1 text-xs text-gray-600">
                                                <span>{{ $item['quantity'] }}x</span>
                                                <span class="font-semibold text-[#031636]">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Bottom Pricing & Action --}}
                        <div class="p-6 flex flex-col gap-4 bg-white">
                            
                            <div class="flex items-center justify-between text-sm text-gray-600">
                                <span>Subtotal</span>
                                <span class="font-bold text-[#031636]">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>

                            <div class="flex items-center justify-between text-sm text-gray-600">
                                <span>Biaya Layanan</span>
                                <span class="font-semibold text-emerald-600">Gratis</span>
                            </div>

                            <div class="border-t border-gray-200"></div>

                            <div class="flex items-center justify-between">
                                <span class="font-bold text-[#031636] text-lg">Total</span>
                                <span class="font-extrabold text-[#c2410c] text-2xl">
                                    Rp {{ number_format($total, 0, ',', '.') }}
                                </span>
                            </div>

                            {{-- Info Notice Box --}}
                            <div class="bg-[#e0f2fe] border border-[#bae6fd] rounded-2xl p-3.5 flex items-start gap-2.5 text-xs text-[#0369a1] leading-relaxed">
                                <svg class="w-4 h-4 text-[#0284c7] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Setelah pesanan dibuat, Anda akan diarahkan ke WhatsApp admin untuk konfirmasi pembayaran.</span>
                            </div>

                            {{-- Buat Pesanan Button --}}
                            <button type="submit" class="w-full bg-[#7c2d12] hover:bg-[#9a3412] text-white text-base font-bold py-3.5 px-6 rounded-full transition shadow-md hover:shadow-lg flex items-center justify-center gap-2 group cursor-pointer">
                                <span>Buat Pesanan</span>
                                <svg class="w-5 h-5 transform group-hover:translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>

                        </div>

                    </div>
                </div>

            </div>
        </form>

    </main>

    {{-- SHARED FOOTER --}}
    @include('partials.footer')

</body>
</html>
