<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice {{ $order->order_number }} - Amma Science Kids</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @media print {
            header, footer, .no-print {
                display: none !important;
            }
            body {
                background: white !important;
                padding: 0 !important;
            }
            .invoice-card {
                border: none !important;
                box-shadow: none !important;
                padding: 0 !important;
                max-width: 100% !important;
            }
        }
    </style>
</head>
<body class="font-sans antialiased bg-[#f8fbff] text-[#44474e] min-h-screen flex flex-col justify-between">

    {{-- TOP NAVBAR --}}
    <header class="sticky top-0 z-50 shadow-md bg-[#0c4185] border-b border-white/10 no-print">
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
                <a href="{{ route('program') }}" class="flex items-center gap-2 text-white hover:text-[#fc6c29] text-sm font-semibold tracking-wide transition">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
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

    @php
        $waNumber = '6285113242985';
        $waText = urlencode("Halo Admin Amma Science Kids, saya ingin konfirmasi pembayaran untuk pesanan:\n\n*No. Invoice:* {$order->order_number}\n*Nama:* {$order->customer_name}\n*Total Pembayaran:* Rp " . number_format($order->total_amount, 0, ',', '.') . "\n\nMohon info dan verifikasinya. Terima kasih!");
        $waUrl = "https://wa.me/{$waNumber}?text={$waText}";
    @endphp

    {{-- MAIN CONTAINER --}}
    <main class="home-doodle max-w-4xl mx-auto px-4 sm:px-6 md:px-10 py-10 flex-1 w-full relative">
        {{-- Background Pattern Decoration --}}
        <div class="absolute inset-0 pointer-events-none opacity-40 overflow-hidden -z-10 no-print" style="background-image: radial-gradient(#0c4185 0.75px, transparent 0.75px); background-size: 24px 24px;"></div>

        {{-- TOP ACTION BUTTONS --}}
        <div class="flex flex-wrap items-center justify-center gap-4 mb-8 no-print">
            
            {{-- Download / Print Invoice Button --}}
            <button onclick="window.print()" class="bg-white hover:bg-gray-50 border border-gray-300 text-[#031636] font-bold text-sm px-6 py-2.5 rounded-full shadow-sm hover:shadow transition flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4 text-[#0c4185]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                <span>Download Invoice</span>
            </button>

            {{-- WhatsApp Confirmation Button --}}
            <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer" class="bg-[#22c55e] hover:bg-[#16a34a] text-white font-bold text-sm px-6 py-2.5 rounded-full shadow-sm hover:shadow-md transition flex items-center gap-2">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                </svg>
                <span>Konfirmasi Pembayaran via WhatsApp</span>
            </a>

        </div>

        {{-- INVOICE CARD --}}
        <div class="invoice-card bg-white rounded-3xl border border-gray-200/90 shadow-xl p-6 sm:p-10 md:p-12 relative overflow-hidden flex flex-col gap-8">
            
            {{-- Header Invoice --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 border-b border-gray-100 pb-8">
                
                {{-- Brand Info --}}
                <div class="flex items-center gap-4">
                    <img src="{{ asset('img/Logo.png') }}"
                         alt="Amma Science Kids Logo"
                         class="h-16 w-16 object-contain rounded p-1 bg-white border border-gray-100 shadow-sm" />
                    <div>
                        <h2 class="font-display font-extrabold text-[#031636] text-2xl tracking-tight leading-tight">
                            Amma Science Kids
                        </h2>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mt-0.5">
                            Educational Journal
                        </p>
                    </div>
                </div>

                {{-- Invoice Number & Status --}}
                <div class="flex flex-col sm:items-end items-start gap-1.5">
                    <span class="text-xs font-bold uppercase tracking-widest text-gray-400">INVOICE</span>
                    <span class="font-mono font-bold text-gray-900 text-lg sm:text-xl">{{ $order->order_number }}</span>
                    
                    @if ($order->status === 'sudah_bayar')
                        <div class="inline-flex items-center gap-1.5 bg-emerald-50 border border-emerald-300 text-emerald-700 text-xs font-bold px-3.5 py-1 rounded-full mt-1">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            <span>LUNAS</span>
                        </div>
                    @else
                        <div class="inline-flex items-center gap-1.5 bg-orange-50 border border-orange-300 text-[#ea580c] text-xs font-bold px-3.5 py-1 rounded-full mt-1">
                            <span class="w-2 h-2 rounded-full bg-orange-500 animate-pulse"></span>
                            <span>MENUNGGU PEMBAYARAN</span>
                        </div>
                    @endif
                </div>

            </div>

            {{-- 2-Column Info Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                
                {{-- Customer Info --}}
                <div class="flex flex-col gap-1">
                    <span class="text-xs font-bold uppercase tracking-wider text-gray-400">DITAGIHKAN KEPADA:</span>
                    <h3 class="font-bold text-[#031636] text-lg mt-0.5">{{ $order->customer_name }}</h3>
                    <p class="text-gray-600">{{ $order->customer_email }}</p>
                    <p class="text-gray-600">{{ $order->customer_phone }}</p>
                    @if ($order->notes)
                        <p class="text-xs text-gray-500 italic mt-1.5 bg-gray-50 p-2 rounded-lg border border-gray-100">
                            <strong>Catatan:</strong> {{ $order->notes }}
                        </p>
                    @endif
                </div>

                {{-- Date Info --}}
                <div class="flex flex-col md:items-end gap-1">
                    <div class="flex flex-col md:items-end mb-3">
                        <span class="text-xs font-bold uppercase tracking-wider text-gray-400">TANGGAL INVOICE:</span>
                        <span class="font-semibold text-gray-800 text-sm mt-0.5">
                            {{ $order->created_at ? $order->created_at->translatedFormat('d F Y') : date('d F Y') }}
                        </span>
                    </div>

                    <div class="flex flex-col md:items-end">
                        <span class="text-xs font-bold uppercase tracking-wider text-gray-400">JATUH TEMPO:</span>
                        <span class="font-bold text-[#c2410c] text-sm mt-0.5">
                            {{ $order->payment_due_date ? $order->payment_due_date->translatedFormat('d F Y') : $order->created_at->addDays(3)->translatedFormat('d F Y') }}
                        </span>
                    </div>
                </div>

            </div>

            {{-- Items Table --}}
            <div class="flex flex-col mt-2">
                <div class="grid grid-cols-12 text-xs font-bold uppercase tracking-wider text-gray-400 border-b border-gray-200 pb-3">
                    <div class="col-span-6 sm:col-span-7">DESKRIPSI PROGRAM</div>
                    <div class="col-span-2 text-center">JML</div>
                    <div class="col-span-2 text-right hidden sm:block">HARGA</div>
                    <div class="col-span-4 sm:col-span-3 text-right">TOTAL</div>
                </div>

                <div class="divide-y divide-gray-100">
                    @foreach ($order->items as $item)
                        <div class="grid grid-cols-12 py-4 items-center text-sm">
                            <div class="col-span-6 sm:col-span-7 pr-2">
                                <h4 class="font-bold text-[#031636] leading-snug">{{ $item->item_name }}</h4>
                                <p class="text-xs text-gray-500 mt-0.5">{{ $item->item_subtitle ?? 'Kategori: ' . ($item->item_category ?? 'Sains') }}</p>
                            </div>
                            <div class="col-span-2 text-center text-gray-700 font-medium">
                                {{ $item->quantity }}
                            </div>
                            <div class="col-span-2 text-right text-gray-600 hidden sm:block">
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </div>
                            <div class="col-span-4 sm:col-span-3 text-right font-bold text-[#031636]">
                                Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Subtotals & Total Summary --}}
            <div class="flex flex-col gap-2.5 sm:w-1/2 sm:self-end pt-4 border-t border-gray-100 text-sm">
                <div class="flex items-center justify-between text-gray-600">
                    <span>Subtotal</span>
                    <span class="font-semibold text-[#031636]">Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span>
                </div>

                <div class="flex items-center justify-between text-gray-600">
                    <span>Biaya Admin</span>
                    @if ($order->service_fee > 0)
                        <span class="font-semibold text-[#031636]">Rp {{ number_format($order->service_fee, 0, ',', '.') }}</span>
                    @else
                        <span class="font-semibold text-emerald-600">Gratis</span>
                    @endif
                </div>

                <div class="bg-[#f8fafc] border border-gray-200 rounded-2xl p-4 flex items-center justify-between mt-2">
                    <span class="font-bold text-[#031636] text-base">Total Pembayaran</span>
                    <span class="font-extrabold text-[#c2410c] text-xl sm:text-2xl">
                        Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                    </span>
                </div>
            </div>

            {{-- Bank Transfer Box --}}
            <div class="bg-[#f8fafc] border border-gray-200/90 rounded-2xl p-6 flex flex-col gap-4">
                
                <div class="flex items-center gap-2.5 text-[#031636]">
                    <svg class="w-5 h-5 text-[#0c4185]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                    </svg>
                    <h4 class="font-display font-bold text-base">Informasi Pembayaran Bank Transfer</h4>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    
                    {{-- Bank BCA --}}
                    <div class="bg-white rounded-xl p-4 border border-gray-200/80 shadow-xs flex flex-col gap-1">
                        <span class="text-xs font-semibold text-gray-500">Bank BCA</span>
                        <div class="flex items-center justify-between">
                            <span class="font-mono font-bold text-base sm:text-lg text-[#031636] tracking-wider">1234 5678 90</span>
                            <button type="button" onclick="navigator.clipboard.writeText('1234567890'); alert('Nomor rekening BCA berhasil disalin!');" class="text-xs text-[#0c4185] hover:underline font-semibold no-print">
                                Salin
                            </button>
                        </div>
                        <span class="text-xs text-gray-600">a.n Amma Science Kids</span>
                    </div>

                    {{-- Bank Mandiri --}}
                    <div class="bg-white rounded-xl p-4 border border-gray-200/80 shadow-xs flex flex-col gap-1">
                        <span class="text-xs font-semibold text-gray-500">Bank Mandiri</span>
                        <div class="flex items-center justify-between">
                            <span class="font-mono font-bold text-base sm:text-lg text-[#031636] tracking-wider">098 7654 321</span>
                            <button type="button" onclick="navigator.clipboard.writeText('0987654321'); alert('Nomor rekening Mandiri berhasil disalin!');" class="text-xs text-[#0c4185] hover:underline font-semibold no-print">
                                Salin
                            </button>
                        </div>
                        <span class="text-xs text-gray-600">a.n Amma Science Kids</span>
                    </div>

                </div>

                {{-- Alert Notification inside Bank Box --}}
                <div class="bg-[#ccfbf1] text-[#0f766e] border border-[#99f6e4] rounded-xl p-3 text-xs text-center font-medium">
                    Mohon konfirmasi via WhatsApp setelah melakukan transfer dengan menyertakan bukti bayar.
                </div>

            </div>

            {{-- Footer Note inside Invoice --}}
            <div class="text-center pt-2 text-xs text-gray-500 flex flex-col gap-1">
                <p class="font-medium">Terima kasih telah berinvestasi pada masa depan ilmuwan cilik Anda!</p>
                <p class="text-gray-400">Amma Science Kids © {{ date('Y') }}</p>
            </div>

        </div>
    </main>

    {{-- SHARED FOOTER --}}
    @include('partials.footer')

</body>
</html>
