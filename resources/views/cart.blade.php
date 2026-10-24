<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keranjang Belanja - Amma Science Kids</title>
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

            <a href="{{ route('program') }}" class="flex items-center gap-2 text-white hover:text-[#fc6c29] text-sm font-semibold tracking-wide transition">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Kembali</span>
            </a>
        </div>
    </header>

    {{-- FLASH MESSAGES --}}
    @if (session('success'))
        <div class="max-w-7xl mx-auto px-6 md:px-10 pt-6 w-full">
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl flex items-center gap-3 text-sm shadow-sm">
                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if (session('warning'))
        <div class="max-w-7xl mx-auto px-6 md:px-10 pt-6 w-full">
            <div class="bg-amber-50 border border-amber-200 text-amber-800 px-4 py-3 rounded-xl flex items-center gap-3 text-sm shadow-sm">
                <svg class="w-5 h-5 text-amber-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <span>{{ session('warning') }}</span>
            </div>
        </div>
    @endif

    {{-- MAIN CONTAINER --}}
    <main class="home-doodle max-w-7xl mx-auto px-6 md:px-10 py-10 flex-1 w-full relative">
        
        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="font-display font-extrabold text-[#031636] text-3xl md:text-4xl tracking-tight">
                Keranjang Belanja
            </h1>
            <p class="text-[#59606d] text-sm md:text-base mt-2">
                Tinjau kembali eksperimen dan program seru yang telah Anda pilih sebelum melanjutkan ke pembayaran.
            </p>
        </div>

        @if (count($cart) > 0)
            <div class="flex flex-col lg:flex-row items-start gap-8 w-full">
                
                {{-- LEFT COLUMN: CART ITEMS (Takes remaining width) --}}
                <div class="w-full lg:flex-1 flex flex-col gap-4">
                    
                    {{-- Header Table --}}
                    <div class="hidden sm:flex items-center justify-between text-xs font-bold uppercase tracking-wider text-gray-400 px-4 pb-1">
                        <span class="w-1/2">Program / Produk</span>
                        <span class="w-1/4 text-center">Jumlah</span>
                        <span class="w-1/4 text-right">Subtotal</span>
                    </div>

                    {{-- Items Cards --}}
                    @foreach ($cart as $id => $item)
                        <div class="bg-white rounded-2xl border border-gray-200/90 p-4 sm:p-5 shadow-sm hover:shadow-md transition flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            
                            {{-- Info --}}
                            <div class="flex items-center gap-4 sm:w-1/2">
                                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl overflow-hidden shrink-0 bg-gray-100 border border-gray-200 flex items-center justify-center">
                                    @if (!empty($item['image']))
                                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-[#aadaff] to-[#0c4185] flex items-center justify-center text-white">
                                            <svg class="w-8 h-8 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                <div class="flex flex-col items-start gap-1">
                                    <span class="bg-[#e0f2fe] text-[#0369a1] text-[10px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded">
                                        {{ $item['category'] ?? 'PROGRAM' }}
                                    </span>
                                    <h3 class="font-display font-bold text-[#031636] text-base leading-snug">
                                        {{ $item['title'] }}
                                    </h3>
                                    <p class="text-xs text-gray-500">
                                        {{ $item['subtitle'] ?? 'Rp ' . number_format($item['price'], 0, ',', '.') . ' / item' }}
                                    </p>
                                </div>
                            </div>

                            {{-- Quantity Counter --}}
                            <div class="flex items-center justify-between sm:justify-center sm:w-1/4">
                                <div class="flex items-center border border-gray-300 rounded-full px-3 py-1 bg-gray-50">
                                    <form action="{{ route('cart.update', $id) }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="action" value="decrease">
                                        <button type="submit" class="w-6 h-6 flex items-center justify-center text-gray-500 hover:text-red-600 font-bold transition rounded-full hover:bg-gray-200" title="Kurangi">−</button>
                                    </form>
                                    
                                    <span class="w-8 text-center text-sm font-bold text-[#031636]">
                                        {{ $item['quantity'] }}
                                    </span>

                                    <form action="{{ route('cart.update', $id) }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="action" value="increase">
                                        <button type="submit" class="w-6 h-6 flex items-center justify-center text-gray-500 hover:text-emerald-600 font-bold transition rounded-full hover:bg-gray-200" title="Tambah">+</button>
                                    </form>
                                </div>
                            </div>

                            {{-- Subtotal & Remove --}}
                            <div class="flex items-center justify-between sm:justify-end gap-4 sm:w-1/4">
                                <span class="font-bold text-[#031636] text-base">
                                    Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                </span>

                                <form action="{{ route('cart.remove', $id) }}" method="POST" onsubmit="return confirm('Hapus item ini dari keranjang?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-400 hover:text-red-500 p-1.5 rounded-lg hover:bg-red-50 transition" title="Hapus Item">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>

                        </div>
                    @endforeach

                    {{-- Bottom Navigation Links --}}
                    <div class="flex items-center justify-between pt-3">
                        <a href="{{ route('program') }}" class="text-sm font-semibold text-[#0c4185] hover:underline flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Tambah Program Lain
                        </a>

                        <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Kosongkan semua item di keranjang?');">
                            @csrf
                            <button type="submit" class="text-xs text-red-500 hover:text-red-700 hover:underline">
                                Kosongkan Keranjang
                            </button>
                        </form>
                    </div>

                </div>

                {{-- RIGHT COLUMN: ORDER SUMMARY CARD (Fixed Width on Desktop) --}}
                <div class="w-full lg:w-[380px] shrink-0 sticky top-24">
                    <div class="bg-[#dcf3fc] border border-[#bae6fd] rounded-3xl p-6 sm:p-7 shadow-sm flex flex-col gap-5">
                        
                        {{-- Header Card --}}
                        <div class="flex items-center gap-2.5 text-[#031636]">
                            <svg class="w-6 h-6 text-[#0c4185]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <h2 class="font-display font-bold text-xl">Ringkasan Pesanan</h2>
                        </div>

                        {{-- Subtotal Row --}}
                        <div class="flex items-center justify-between text-sm text-[#334155] pt-1">
                            <span>Subtotal ({{ $totalItems }} Item)</span>
                            <span class="font-bold text-[#031636]">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>

                        {{-- Promo Code Box --}}
                        <div class="flex flex-col gap-1.5">
                            <label for="promo_code" class="text-xs font-semibold text-[#475569]">Kode Promo</label>
                            <div class="flex rounded-xl overflow-hidden border border-gray-300 bg-white focus-within:ring-2 focus-within:ring-[#0c4185]">
                                <input type="text" id="promo_code" placeholder="Masukkan kode" class="w-full px-3 py-2 text-sm bg-transparent border-0 focus:outline-none focus:ring-0 text-[#031636]">
                                <button type="button" class="bg-[#031636] hover:bg-[#0c4185] text-white text-xs font-bold px-4 py-2 transition shrink-0">
                                    Terapkan
                                </button>
                            </div>
                        </div>

                        <div class="border-t border-[#bae6fd]"></div>

                        {{-- Total Row --}}
                        <div class="flex items-center justify-between">
                            <span class="font-bold text-[#031636] text-lg">Total</span>
                            <span class="font-extrabold text-[#fc6c29] text-2xl">
                                Rp {{ number_format($subtotal, 0, ',', '.') }}
                            </span>
                        </div>

                        {{-- Checkout Button --}}
                        <a href="{{ route('checkout.index') }}" class="w-full bg-[#fc6c29] hover:bg-[#e05615] text-white text-base font-bold py-3.5 px-6 rounded-full transition shadow-md hover:shadow-lg flex items-center justify-center gap-2 group text-center">
                            <span>Lanjut Checkout</span>
                            <svg class="w-5 h-5 transform group-hover:translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>

                        {{-- Security Notice --}}
                        <div class="flex items-center justify-center gap-2 text-xs text-[#526071] pt-1">
                            <svg class="w-4 h-4 text-[#0c4185]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <span>Pembayaran Aman &amp; Terenkripsi</span>
                        </div>

                    </div>
                </div>

            </div>
        @else
            {{-- EMPTY CART STATE --}}
            <div class="max-w-md mx-auto my-12 bg-white border border-gray-200 rounded-3xl p-8 text-center flex flex-col items-center shadow-sm">
                <div class="w-20 h-20 rounded-full bg-[#e0f2fe] flex items-center justify-center text-[#0c4185] mb-4">
                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h2 class="font-display font-bold text-[#031636] text-2xl mb-2">Keranjang Anda Kosong</h2>
                <p class="text-gray-500 text-sm mb-6">
                    Anda belum menambahkan program eksperimen atau produk sains apapun ke keranjang belanja.
                </p>
                <a href="{{ route('program') }}" class="bg-[#fc6c29] hover:bg-[#e05615] text-white font-bold px-8 py-3 rounded-full transition shadow-md flex items-center gap-2">
                    <span>Jelajahi Program</span>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        @endif
    </main>

    {{-- SHARED FOOTER --}}
    @include('partials.footer')

</body>
</html>
