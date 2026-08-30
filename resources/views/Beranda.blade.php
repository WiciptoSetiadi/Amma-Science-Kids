<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amma Science Kids</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-700 bg-doodle relative">

    <header class="bg-navy text-white px-6 md:px-12 py-4 flex items-center justify-between sticky top-0 z-50 shadow-md">
        <div class="flex items-center gap-2 cursor-pointer">
               {{-- Logo --}}
            <a href="/" class="flex items-center gap-3 shrink-0">
                <img src="{{ asset('build/assets/IMG/Logo.png') }}"
                     alt="Amma Science Kids Logo"
                     class="h-[56px] w-[56px] object-contain rounded" />
            </a>
           
        </div>

        <nav class="hidden lg:flex items-center gap-8 font-medium text-sm">
            <a href="/" class="text-orange border-b-2 border-orange pb-1">Beranda</a>
            <a href="/tentang" class="hover:text-orange transition">Tentang Kami</a>
            <a href="/program" class="hover:text-orange transition">Program</a>
            <a href="/artikel" class="hover:text-orange transition">Artikel</a>
            <a href="/galeri" class="hover:text-orange transition">Galeri</a>
            <a href="/kontak" class="hover:text-orange transition">Kontak</a>
        </nav>

        <div class="flex items-center gap-5">
            <button class="hover:text-orange text-lg" aria-label="Keranjang">🛒</button>
            <a href="#" class="hidden md:block font-medium hover:text-orange transition">Masuk</a>
            <button class="bg-orange hover:bg-orange-dark text-white px-6 py-2 rounded-full font-bold transition shadow-sm">
                Pesan Sekarang
            </button>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 md:px-12 pt-12 pb-24">
        
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center min-h-[80vh]">
            <div class="flex flex-col items-start gap-6">
                <div class="bg-mint-light text-teal-800 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider border border-mint flex items-center gap-2 shadow-sm">
                    🧪 Sains Seasyik Bermain
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black font-display text-navy leading-[1.1]">
                    Belajar Menjelajahi Ciptaan Allah bersama 
                    <span class="block mt-2">
                        <span class="text-outline text-5xl md:text-7xl tracking-wide">Amma Science</span> 
                        <span class="text-5xl md:text-7xl"><span class="text-orange">K</span><span class="text-blue-500">i</span><span class="text-yellow">D</span><span class="text-mint">S</span></span>
                    </span>
                </h1>

                <p class="text-lg md:text-xl text-gray-600 max-w-lg leading-relaxed">
                    Amma Science Kids menghadirkan pengalaman belajar berbasis permainan, petualangan, dan eksperimen otentik untuk menumbuhkan rasa ingin tahu alamiah anak.
                </p>

                <div class="flex flex-wrap items-center gap-4 mt-2">
                    <button class="bg-orange hover:bg-orange-dark text-white px-8 py-3.5 rounded-full font-bold transition shadow-lg shadow-orange/30 flex items-center gap-2">
                        Jelajahi Program <span class="text-xl">→</span>
                    </button>
                    <button class="border-2 border-navy text-navy hover:bg-navy hover:text-white px-8 py-3.5 rounded-full font-bold transition">
                        Kenali AMMA
                    </button>
                </div>
            </div>

            <div class="relative w-full max-w-lg mx-auto lg:ml-auto mt-10 lg:mt-0">
                <div class="absolute inset-0 bg-mint-light rounded-[3rem] transform translate-x-4 translate-y-4 shadow-xl border border-mint/20"></div>
                
                <img src="{{ asset('build/assets/IMG/Kids1.png') }}" 
                     alt="Anak belajar sains" 
                     class="relative z-10 w-full h-[500px] object-cover rounded-[3rem] shadow-md border-4 border-white" />
                
                <div class="absolute -bottom-6 -left-6 md:-left-12 z-20 bg-white rounded-2xl p-4 shadow-xl border border-gray-100 flex items-center gap-4 hover:-translate-y-1 transition duration-300">
                    <div class="bg-mint p-3 rounded-full text-white text-xl">
                        🔬
                    </div>
                    <div>
                        <div class="font-bold text-navy">EKSPERIMEN SERU</div>
                        <div class="text-xs text-gray-500 font-medium">Belajar langsung di alam</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-32" id="program">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
                <div class="max-w-xl">
                    <div class="text-mint font-bold flex items-center gap-2 mb-3">
                        <span class="bg-mint-light p-1.5 rounded-md">🌱</span> Program Unggulan
                    </div>
                    <p class="text-gray-600 text-lg">
                        Kurikulum yang dirancang khusus sesuai dengan fitrah dan tahapan usia anak, menghadirkan pembelajaran yang membumi dan nyata.
                    </p>
                </div>
                <a href="#" class="text-mint font-bold hover:underline whitespace-nowrap">Lihat Semua Program →</a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                
                <div class="lg:col-span-7 bg-purple-soft border-[4px] border-[#FBCFB6] rounded-[2rem] overflow-hidden flex flex-col hover:shadow-2xl transition duration-300">
                    <div class="relative h-64 md:h-80 bg-gray-200 p-4">
                        <div class="absolute top-6 left-6 z-10 bg-cyan-200 text-cyan-900 text-xs font-black px-3 py-1 uppercase rounded-md tracking-wider border-2 border-cyan-800">
                            Online Play Date
                        </div>
                        <img src="https://images.unsplash.com/photo-1540479859555-17af45c78602?auto=format&fit=crop&w=900&q=80" 
                             alt="Penjelajah Gaya & Gerak" 
                             class="w-full h-full object-cover rounded-2xl border-[3px] border-navy" />
                    </div>
                    <div class="p-8 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-3xl font-display font-black text-navy mb-4">Penjelajah Gaya & Gerak</h3>
                            <p class="text-gray-700 leading-relaxed mb-6">
                                Memahami konsep dasar fisika melalui aktivitas lapangan dan permainan interaktif yang melibatkan gerak, gaya, dan energi mekanik dalam kehidupan sehari-hari anak.
                            </p>
                        </div>
                        <div class="flex items-center justify-between pt-6 border-t border-purple-300">
                            <span class="text-sm font-bold text-gray-600 flex items-center gap-2">
                                ⏱️ Usia 5-8 Tahun
                            </span>
                            <a href="#" class="text-mint font-bold hover:underline">Baca Jurnal →</a>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 flex flex-col gap-6">
                    
                    <div class="bg-orange border-[3px] border-navy rounded-[1.5rem] p-5 flex gap-5 items-center shadow-[4px_4px_0px_#0F1C35] hover:translate-x-1 hover:-translate-y-1 transition duration-300 cursor-pointer">
                        <img src="https://images.unsplash.com/photo-1603352591605-7f41530e71ce?auto=format&fit=crop&w=200&q=80" 
                             class="w-24 h-24 object-cover rounded-xl border-2 border-navy bg-white" alt="Ilmuwan Cilik">
                        <div class="text-navy">
                            <h4 class="font-black font-display text-xl mb-1">Ilmuwan Cilik</h4>
                            <p class="text-sm font-medium leading-tight mb-2 opacity-90">Eksperimen aman mengenalkan reaksi perubahan wujud zat.</p>
                            <span class="text-xs font-bold bg-white/30 px-2 py-1 rounded">📅 Usia 6-10 Thn</span>
                        </div>
                    </div>

                    <div class="bg-yellow border-[3px] border-navy rounded-[1.5rem] p-5 flex gap-5 items-center shadow-[4px_4px_0px_#0F1C35] hover:translate-x-1 hover:-translate-y-1 transition duration-300 cursor-pointer">
                        <img src="https://images.unsplash.com/photo-1596464716127-f2a82984de30?auto=format&fit=crop&w=200&q=80" 
                             class="w-24 h-24 object-cover rounded-xl border-2 border-navy bg-white" alt="Detektif Alam">
                        <div class="text-navy">
                            <h4 class="font-black font-display text-xl mb-1">Detektif Alam</h4>
                            <p class="text-sm font-medium leading-tight mb-2 opacity-90">Mengamati ekosistem dan serangga secara langsung di...</p>
                            <span class="text-xs font-bold bg-white/30 px-2 py-1 rounded">📅 Usia 4-7 Thn</span>
                        </div>
                    </div>

                    <div class="bg-green-neon border-[3px] border-dashed border-navy rounded-[1.5rem] p-8 flex flex-col items-center text-center mt-2 flex-1 justify-center">
                        <div class="bg-mint p-3 rounded-full text-white text-xl border-2 border-navy mb-4">
                            💬
                        </div>
                        <h4 class="font-bold text-navy mb-2">Punya minat khusus?</h4>
                        <p class="text-sm font-medium text-navy/80 mb-6">Konsultasikan kurikulum yang tepat untuk anak Anda.</p>
                        <button class="bg-yellow border-2 border-navy px-6 py-2 rounded-full font-bold text-navy hover:bg-orange transition shadow-[2px_2px_0px_#0F1C35]">
                            Hubungi Fasilitator
                        </button>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <footer class="bg-navy text-white pt-16 pb-8" id="contact">
        <div class="max-w-7xl mx-auto px-6 md:px-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12 border-b border-white/10 pb-12">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="bg-white rounded-lg p-1 flex items-center justify-center h-10 w-10">
                            <span class="text-xl text-navy">🔬</span>
                        </div>
                        <span class="font-display font-black text-xl tracking-wide">
                            Amma Science
                            <span class="text-orange">K</span><span class="text-blue-400">i</span><span class="text-yellow">D</span><span class="text-mint">S</span>
                        </span>
                    </div>
                    <p class="text-gray-400 leading-relaxed max-w-sm text-sm">
                        Amma Science Kids menghadirkan pengalaman belajar berbasis permainan, petualangan, dan eksperimen otentik yang mengajak anak mentadabburi ayat-ayat kauniyah Allah.
                    </p>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-6 text-gray-100">Tautan</h4>
                    <ul class="space-y-4 text-sm text-gray-400 font-medium">
                        <li><a href="#" class="hover:text-orange transition">Kebijakan Privasi</a></li>
                        <li><a href="#" class="hover:text-orange transition">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="hover:text-orange transition">Bantuan</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-6 text-gray-100">Kontak Kami</h4>
                    <ul class="space-y-4 text-sm text-gray-400 font-medium">
                        <li class="flex items-center gap-3">
                            <span>✉️</span> ammasciencekids@gmail.com
                        </li>
                        <li class="flex items-center gap-3">
                            <span>📞</span> (+62) 851 1324 2985
                        </li>
                        <li class="flex items-center gap-3">
                            <span>📷</span> @ammasciencekids
                        </li>
                    </ul>
                </div>
            </div>

            <div class="text-center text-sm text-gray-500 font-medium">
                © 2024 Amma Science Kids. | Menumbuhkan Fitrah Keingintahuan Anak.
            </div>
        </div>
    </footer>
</body>
</html>