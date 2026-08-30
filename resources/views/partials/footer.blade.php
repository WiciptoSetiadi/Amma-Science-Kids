{{-- =========================================
     SHARED FOOTER — Amma Science Kids
     Digunakan oleh semua halaman
========================================= --}}
<footer class="bg-[#031636] border-t-8 border-[#a63b00] text-white pt-2 pb-0" id="contact">
    <div class="max-w-7xl mx-auto px-6 md:px-10">

        {{-- Grid utama --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 py-20">

            {{-- Brand --}}
            <div class="md:col-span-2 flex flex-col gap-4 items-start">
                <img src="https://www.figma.com/api/mcp/asset/2106bd43-a7b4-4af3-bc9c-99cd9f3313e6.png"
                     alt="Amma Science Kids Logo"
                     class="h-16 w-16 object-contain bg-white rounded p-1" />
                <p class="text-[#d8e2ff] text-sm leading-[1.625] opacity-90 max-w-md">
                    Amma Science Kids menghadirkan pengalaman belajar berbasis permainan, petualangan, eksperimen, dan tantangan yang mengajak anak mentadabburi ayat-ayat kauniyah Allah.
                </p>
            </div>

            {{-- Tautan --}}
            <div class="flex flex-col items-start">
                <div class="pb-2 mb-3">
                    <h4 class="font-display font-bold text-white text-xl leading-7"
                        style="font-variation-settings: 'YTLC' 500, 'wdth' 100">Tautan</h4>
                </div>
                <ul class="flex flex-col gap-3">
                    <li><a href="#" class="flex items-center gap-2 text-[#d8e2ff] text-sm opacity-80 hover:opacity-100 transition"><span class="w-1 h-1 bg-[#a63b00] rounded-full shrink-0"></span>Kebijakan Privasi</a></li>
                    <li><a href="#" class="flex items-center gap-2 text-[#d8e2ff] text-sm opacity-80 hover:opacity-100 transition"><span class="w-1 h-1 bg-[#a63b00] rounded-full shrink-0"></span>Syarat &amp; Ketentuan</a></li>
                    <li><a href="#" class="flex items-center gap-2 text-[#d8e2ff] text-sm opacity-80 hover:opacity-100 transition"><span class="w-1 h-1 bg-[#a63b00] rounded-full shrink-0"></span>Bantuan</a></li>
                </ul>
            </div>

            {{-- Kontak --}}
            <div class="flex flex-col items-start">
                <div class="pb-2 mb-3">
                    <h4 class="font-display font-bold text-white text-xl leading-7"
                        style="font-variation-settings: 'YTLC' 500, 'wdth' 100">Kontak Kami</h4>
                </div>
                <ul class="flex flex-col gap-4">
                    <li class="flex items-center gap-3 opacity-80">
                        <svg class="w-5 h-[1.333rem] text-[rgba(255,255,255,0.8)] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-[rgba(255,255,255,0.8)] text-base leading-6">ammasciencekids@gmail.com</span>
                    </li>
                    <li class="flex items-center gap-3 opacity-80">
                        <svg class="w-[1.406rem] h-[1.406rem] text-[#d8e2ff] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span class="text-[#d8e2ff] text-sm leading-5">(+62) 851 1324 2985</span>
                    </li>
                    <li class="flex items-center gap-3 opacity-80">
                        <svg class="w-[1.479rem] h-[1.406rem] text-[#d8e2ff] shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                        </svg>
                        <span class="text-[#d8e2ff] text-sm leading-5">@ammasciencekids</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="border-t border-[rgba(216,226,255,0.1)] py-8">
            <div class="flex items-center justify-center gap-2 opacity-60">
                <span class="text-[#d8e2ff] text-sm text-center leading-5">© 2024 Amma Science Kids.</span>
                <span class="text-[#d8e2ff] text-sm">|</span>
                <span class="text-[#d8e2ff] text-sm text-center leading-5">Menumbuhkan Fitrah Keingintahuan Anak.</span>
            </div>
        </div>
    </div>
</footer>
