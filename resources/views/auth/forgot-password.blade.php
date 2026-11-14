<x-auth.layout title="Lupa Kata Sandi">
    <main class="auth-shell auth-login-shell">
        <section class="auth-login-panel">
            <div class="auth-login-content">
                <a href="{{ route('login') }}" class="auth-home-link">
                    <span aria-hidden="true">←</span> Kembali ke Masuk
                </a>
                <a href="{{ route('home') }}" class="auth-brand" aria-label="Kembali ke beranda Amma Science Kids">
                    <img src="{{ asset('img/Logo.png') }}" alt="" class="auth-brand-mark">
                    <span>Amma Science<br>Kids<span class="auth-brand-dot">.</span></span>
                </a>

                <div class="auth-copy auth-login-copy">
                    <h1>Lupa<br>Kata Sandi?</h1>
                    <p>Masukkan alamat email Anda untuk menerima tautan atur ulang kata sandi.</p>
                </div>

                @if (session('status'))
                    <div class="auth-status" role="status">
                        <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="auth-form" data-auth-form>
                    @csrf
                    <div class="auth-field">
                        <label for="email">Email</label>
                        <div class="auth-input-wrap">
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3.75 5.25h16.5v13.5H3.75zM4.5 6l7.5 5.5L19.5 6"/></svg>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" placeholder="nama@email.com" required autofocus>
                        </div>
                        @error('email') <p class="auth-error">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="auth-submit" style="margin-top: 24px;">
                        <span data-submit-label>Kirim Tautan Reset</span>
                        <span aria-hidden="true">→</span>
                    </button>
                </form>

                <p class="auth-switch">Sudah ingat kata sandi Anda? <a href="{{ route('login') }}">Masuk di sini</a></p>
            </div>
        </section>

        <aside class="auth-visual auth-login-visual">
            <img src="{{ asset('img/Kids1.png') }}" alt="Anak-anak melakukan eksperimen sains" class="auth-visual-image">
            <p class="auth-visual-caption">“Belajar adalah jalan mengenal Allah”</p>
        </aside>
    </main>
</x-auth.layout>

