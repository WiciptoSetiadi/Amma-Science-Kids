<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Pembelian - Amma Science Kids</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#f8fbff] text-[#44474e] min-h-screen flex flex-col">
    <header class="sticky top-0 z-50 shadow-md bg-[#0c4185] border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 md:px-10 py-3.5 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0">
                <img src="{{ asset('img/Logo.png') }}" alt="Amma Science Kids Logo" class="h-12 w-12 object-contain rounded" />
                <span class="font-display font-bold text-white text-xl tracking-tight hidden sm:inline">Amma Science Kids</span>
            </a>
            <a href="{{ route('program') }}" class="flex items-center gap-2 text-white hover:text-[#fc6c29] text-sm font-semibold tracking-wide transition">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                <span>Katalog Program</span>
            </a>
        </div>
    </header>

    <main class="home-doodle max-w-5xl mx-auto px-6 md:px-10 py-10 flex-1 w-full">
        <div class="mb-8">
            <p class="text-[#e95605] text-sm font-bold tracking-wider uppercase mb-2">Akun Saya</p>
            <h1 class="font-display font-extrabold text-[#031636] text-3xl md:text-4xl tracking-tight">Riwayat Pembelian</h1>
            <p class="text-[#59606d] mt-2">Lihat kembali semua pesanan program yang pernah Anda buat.</p>
        </div>

        @if ($orders->isEmpty())
            <section class="bg-white rounded-3xl border border-gray-200 p-10 md:p-16 text-center shadow-sm">
                <div class="w-16 h-16 rounded-2xl bg-[#e0f2fe] text-[#0c4185] flex items-center justify-center mx-auto mb-5">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 8h6m-6 4h6" /></svg>
                </div>
                <h2 class="font-display font-bold text-[#031636] text-xl mb-2">Belum ada pembelian</h2>
                <p class="text-sm text-[#59606d] mb-6">Pesanan program Anda akan muncul di sini setelah dibuat.</p>
                <a href="{{ route('program') }}" class="inline-flex items-center justify-center bg-[#e95605] hover:bg-[#cc4a0f] text-white font-semibold px-6 py-3 rounded-full transition">Jelajahi Program</a>
            </section>
        @else
            <div class="space-y-4">
                @foreach ($orders as $order)
                    @php
                        $statusStyles = match ($order->status) {
                            'menunggu_pembayaran' => ['Menunggu Pembayaran', 'bg-amber-50 text-amber-700 border-amber-200'],
                            'menunggu_konfirmasi' => ['Menunggu Konfirmasi', 'bg-blue-50 text-blue-700 border-blue-200'],
                            'dibayar', 'berhasil', 'selesai' => ['Berhasil', 'bg-emerald-50 text-emerald-700 border-emerald-200'],
                            'dibatalkan', 'gagal' => ['Dibatalkan', 'bg-red-50 text-red-700 border-red-200'],
                            default => [\Illuminate\Support\Str::of($order->status)->replace('_', ' ')->title(), 'bg-gray-50 text-gray-700 border-gray-200'],
                        };
                    @endphp
                    <article class="bg-white rounded-3xl border border-gray-200 p-5 sm:p-7 shadow-sm">
                        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 border-b border-gray-100 pb-5">
                            <div>
                                <p class="text-xs uppercase tracking-wider font-semibold text-[#7a8290]">No. Pesanan</p>
                                <h2 class="font-display font-bold text-[#031636] text-lg mt-1">{{ $order->order_number }}</h2>
                                <p class="text-sm text-[#59606d] mt-1">{{ $order->created_at->translatedFormat('d F Y, H:i') }}</p>
                            </div>
                            <span class="self-start border rounded-full px-3 py-1.5 text-xs font-bold {{ $statusStyles[1] }}">{{ $statusStyles[0] }}</span>
                        </div>

                        <div class="py-5 space-y-3">
                            @foreach ($order->items as $item)
                                <div class="flex items-start justify-between gap-4 text-sm">
                                    <div class="min-w-0">
                                        <p class="font-semibold text-[#031636]">{{ $item->item_name }}</p>
                                        <p class="text-[#7a8290] mt-0.5">{{ $item->quantity }} × Rp {{ number_format((float) $item->price, 0, ',', '.') }}</p>
                                    </div>
                                    <p class="font-semibold text-[#031636] whitespace-nowrap">Rp {{ number_format((float) $item->subtotal, 0, ',', '.') }}</p>
                                </div>
                            @endforeach
                        </div>

                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-t border-gray-100 pt-5">
                            <p class="text-sm text-[#59606d]">{{ $order->items->sum('quantity') }} item</p>
                            <div class="flex items-center justify-between sm:justify-end gap-5">
                                <p class="text-sm text-[#59606d]">Total <strong class="text-[#031636] text-base ml-1">Rp {{ number_format((float) $order->total_amount, 0, ',', '.') }}</strong></p>
                                <a href="{{ route('invoice.show', $order->id) }}" class="text-sm font-bold text-[#0c4185] hover:text-[#e95605] transition">Lihat Invoice <span aria-hidden="true">→</span></a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            @if ($orders->hasPages())
                <div class="mt-6">{{ $orders->links() }}</div>
            @endif
        @endif
    </main>

    <footer class="text-center text-xs text-[#7a8290] py-6">© {{ date('Y') }} Amma Science Kids</footer>
</body>
</html>
