<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kebijakan Privasi - Amma Science Kids</title>
    <meta name="description" content="Kebijakan Privasi Amma Science Kids: data apa yang kami kumpulkan, bagaimana kami menggunakannya, dan hak Anda.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-[#44474e]">

    {{-- NAVBAR --}}
    <header class="sticky top-0 z-50 border-b border-white/20 shadow-md relative"
            style="background: rgba(12,65,133,0.95); backdrop-filter: blur(6px);">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-10 py-2.5 sm:py-3 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 shrink-0">
                <img src="{{ asset('img/Logo.png') }}"
                     alt="Amma Science Kids Logo"
                     class="h-11 w-11 sm:h-[56px] sm:w-[56px] object-contain rounded" />
            </a>
            <nav class="hidden lg:flex items-center gap-1 text-sm font-medium">
                <a href="/"        class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Beranda</a>
                <a href="/tentang" class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition leading-tight">Tentang</a>
                <a href="/program" class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Program</a>
                <a href="/artikel" class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Artikel</a>
                <a href="/galeri"  class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Galeri</a>
                <a href="/kontak"  class="px-3 py-2 rounded-lg text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Kontak</a>
            </nav>

            <div class="flex items-center gap-1.5 sm:gap-4">
                <button type="button" class="lg:hidden flex h-11 w-11 items-center justify-center rounded-lg text-white transition hover:bg-white/10" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="mobile-navigation" data-mobile-menu-toggle>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                </button>
                @auth
                    <a href="{{ route('purchase-history.index') }}" class="hidden lg:inline-flex items-center rounded-full border border-white/50 px-3 py-2 text-xs sm:text-sm font-semibold text-white tracking-wide hover:bg-white/10 hover:text-[#fc6c29] transition">Riwayat Pembelian</a>
                    <form method="POST" action="{{ route('logout') }}" class="flex">
                        @csrf
                        <button type="submit" class="px-2 sm:px-4 py-2 text-xs sm:text-sm whitespace-nowrap text-white tracking-[0.05em] transition hover:text-[#fc6c29]">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="flex items-center px-2 sm:px-4 py-2 text-xs sm:text-sm whitespace-nowrap text-white tracking-[0.05em] hover:text-[#fc6c29] transition">Masuk</a>
                @endauth
                <a href="{{ route('cart.index') }}" class="bg-[#e95605] hover:bg-[#cc4a0f] text-white text-xs sm:text-sm tracking-[0.05em] px-3 sm:px-6 py-2.5 rounded-full font-medium transition shadow-sm text-center leading-tight whitespace-nowrap">
                    <span class="sm:hidden">Pesan</span><span class="hidden sm:inline">Pesan<br>Sekarang</span>
                </a>
            </div>
        </div>
        <nav id="mobile-navigation" class="hidden lg:hidden absolute left-0 right-0 top-full border-t border-white/10 bg-[#0c4185] px-6 py-3 shadow-lg" aria-label="Navigasi mobile" data-mobile-menu>
            <div class="mx-auto flex max-w-7xl flex-col gap-1 text-sm font-medium">
                <a href="/" class="rounded-lg px-3 py-2 text-white hover:text-[#fc6c29]">Beranda</a>
                <a href="/tentang" class="rounded-lg px-3 py-2 text-white hover:text-[#fc6c29]">Tentang</a>
                <a href="/program" class="rounded-lg px-3 py-2 text-white hover:text-[#fc6c29]">Program</a>
                <a href="/artikel" class="rounded-lg px-3 py-2 text-white hover:text-[#fc6c29]">Artikel</a>
                <a href="/galeri" class="rounded-lg px-3 py-2 text-white hover:text-[#fc6c29]">Galeri</a>
                <a href="/kontak" class="rounded-lg px-3 py-2 text-white hover:text-[#fc6c29]">Kontak</a>
                @auth
                    <a href="{{ route('purchase-history.index') }}" class="rounded-lg px-3 py-2 text-white hover:text-[#fc6c29]">Riwayat Pembelian</a>
                @endauth
            </div>
        </nav>
    </header>

    <main class="home-doodle">
        <article class="max-w-3xl mx-auto px-6 md:px-8 py-16">

            <header class="mb-10 text-center">
                <h1 class="font-display font-extrabold text-[#031636] text-4xl md:text-5xl tracking-tight"
                    style="font-variation-settings: 'YTLC' 500, 'wdth' 100">Kebijakan Privasi</h1>
                <p class="mt-3 text-sm text-[#44474e]/80">Terakhir diperbarui: 13 November 2026</p>
            </header>

            <div class="space-y-8 text-base leading-7 [&_h2]:font-display [&_h2]:font-bold [&_h2]:text-[#031636] [&_h2]:text-2xl [&_h2]:mb-3 [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:space-y-1">

                <section>
                    <p>
                        Amma Science Kids ("kami") menghargai privasi Anda. Kebijakan ini menjelaskan data apa yang kami kumpulkan
                        saat Anda menggunakan situs <strong>{{ parse_url(config('app.url'), PHP_URL_HOST) }}</strong>,
                        bagaimana data tersebut digunakan, dan hak Anda atas data tersebut.
                    </p>
                </section>

                <section>
                    <h2>1. Data yang Kami Kumpulkan</h2>
                    <ul>
                        <li><strong>Data akun:</strong> nama, alamat email, nomor WhatsApp, dan kata sandi (disimpan dalam bentuk terenkripsi/hash) saat Anda mendaftar.</li>
                        <li><strong>Data dari Google Sign-In:</strong> jika Anda masuk dengan Google, kami menerima nama, alamat email, foto profil, dan ID akun Google Anda. Kami tidak menerima kata sandi Google Anda dan tidak mengakses data lain di akun Google Anda.</li>
                        <li><strong>Data pemesanan:</strong> nama pemesan, nomor telepon, email, catatan pesanan, serta program yang dipesan.</li>
                        <li><strong>Pesan kontak:</strong> nama, email, subjek, dan isi pesan yang Anda kirim melalui halaman Kontak.</li>
                        <li><strong>Data teknis:</strong> cookie sesi yang diperlukan agar Anda tetap masuk, keranjang belanja berfungsi, dan formulir terlindungi dari penyalahgunaan.</li>
                    </ul>
                </section>

                <section>
                    <h2>2. Cara Kami Menggunakan Data</h2>
                    <ul>
                        <li>Membuat dan mengelola akun Anda, termasuk proses masuk dengan Google.</li>
                        <li>Memproses pesanan, mengirim invoice, dan menghubungi Anda terkait pembayaran atau jadwal program.</li>
                        <li>Menjawab pertanyaan yang Anda kirim melalui halaman Kontak atau WhatsApp.</li>
                        <li>Menjaga keamanan situs dan mencegah penyalahgunaan.</li>
                    </ul>
                    <p class="mt-3">Kami <strong>tidak menjual</strong> data pribadi Anda dan tidak menggunakannya untuk iklan.</p>
                </section>

                <section>
                    <h2>3. Penggunaan Data Pengguna Google</h2>
                    <p>
                        Informasi yang kami terima dari Google hanya digunakan untuk membuat akun dan memungkinkan Anda masuk ke situs ini.
                        Penggunaan dan pemindahan informasi tersebut mematuhi
                        <a href="https://developers.google.com/terms/api-services-user-data-policy" target="_blank" rel="noopener noreferrer" class="text-[#0c4185] underline hover:text-[#e95605]">Kebijakan Data Pengguna Layanan API Google</a>,
                        termasuk persyaratan Penggunaan Terbatas (Limited Use). Data tersebut tidak dibagikan kepada pihak ketiga.
                    </p>
                </section>

                <section>
                    <h2>4. Berbagi Data</h2>
                    <p>
                        Data Anda hanya dapat diakses oleh admin Amma Science Kids. Kami dapat menggunakan penyedia layanan
                        (misalnya penyedia hosting dan email) yang memproses data atas nama kami, atau mengungkapkan data jika diwajibkan oleh hukum.
                    </p>
                </section>

                <section>
                    <h2>5. Penyimpanan &amp; Keamanan</h2>
                    <p>
                        Data disimpan di server hosting kami selama akun Anda aktif atau selama diperlukan untuk keperluan pesanan dan administrasi.
                        Kami menggunakan koneksi HTTPS, enkripsi kata sandi, dan pembatasan akses admin untuk melindungi data Anda.
                    </p>
                </section>

                <section>
                    <h2>6. Data Anak</h2>
                    <p>
                        Program kami ditujukan untuk anak-anak, tetapi akun dan pemesanan dibuat oleh orang tua atau wali.
                        Kami tidak dengan sengaja mengumpulkan data pribadi langsung dari anak. Jika Anda yakin seorang anak telah
                        mengirimkan data kepada kami, hubungi kami agar data tersebut dapat dihapus.
                    </p>
                </section>

                <section>
                    <h2>7. Hak Anda</h2>
                    <p>
                        Anda dapat meminta untuk melihat, memperbaiki, atau menghapus data pribadi dan akun Anda kapan saja dengan menghubungi kami.
                        Anda juga dapat mencabut akses Amma Science Kids dari akun Google Anda melalui
                        <a href="https://myaccount.google.com/permissions" target="_blank" rel="noopener noreferrer" class="text-[#0c4185] underline hover:text-[#e95605]">pengaturan izin akun Google</a>.
                    </p>
                </section>

                <section>
                    <h2>8. Perubahan Kebijakan</h2>
                    <p>
                        Kami dapat memperbarui kebijakan ini sewaktu-waktu. Perubahan akan ditampilkan di halaman ini beserta tanggal pembaruannya.
                    </p>
                </section>

                <section>
                    <h2>9. Hubungi Kami</h2>
                    <ul>
                        <li>Email: <a href="mailto:ammasciencekids@gmail.com" class="text-[#0c4185] underline hover:text-[#e95605]">ammasciencekids@gmail.com</a></li>
                        <li>WhatsApp: <a href="https://wa.me/6285113242985" target="_blank" rel="noopener" class="text-[#0c4185] underline hover:text-[#e95605]">(+62) 851 1324 2985</a></li>
                        <li>Lokasi: Surabaya, Jawa Timur</li>
                    </ul>
                </section>
            </div>
        </article>
    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

</body>
</html>