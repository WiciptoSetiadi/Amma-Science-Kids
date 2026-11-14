<x-auth.layout title="Masuk">
    <main class="auth-shell auth-login-shell">
        <section class="auth-login-panel">
            <div class="auth-login-content">
                <a href="{{ route('home') }}" class="auth-home-link">
                    <span aria-hidden="true">←</span> Kembali ke Beranda
                </a>
                <a href="{{ route('home') }}" class="auth-brand" aria-label="Kembali ke beranda Amma Science Kids">
                    <img src="{{ asset('img/Logo.png') }}" alt="" class="auth-brand-mark">
                    <span>Amma Science<br>Kids<span class="auth-brand-dot">.</span></span>
                </a>

                <div class="auth-copy auth-login-copy">
                    <h1>Selamat Datang<br>Kembali</h1>
                    <p>Masuk untuk melanjutkan<br>petualangan sains si kecil.</p>
                </div>

                @if (session('status'))
                    <div class="auth-status" role="status">
                        <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.store') }}" class="auth-form" data-auth-form>
                    @csrf
                    <div class="auth-field">
                        <label for="email">Email</label>
                        <div class="auth-input-wrap">
                            <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" placeholder="nama@email.com" required autofocus>
                        </div>
                        @error('email') <p class="auth-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="auth-field">
                        <div class="auth-label-row">
                            <label for="password">Kata Sandi</label>
                            <a href="{{ route('password.request') }}" class="auth-muted-link">Lupa Kata Sandi?</a>
                        </div>
                        <div class="auth-input-wrap">
                            <input id="password" name="password" type="password" autocomplete="current-password" placeholder="Masukkan kata sandi" required>
                        </div>
                        @error('password') <p class="auth-error">{{ $message }}</p> @enderror
                    </div>

                    <label class="auth-check">
                        <input type="checkbox" name="remember" value="1" @checked(old('remember'))>
                        <span>Ingat saya</span>
                    </label>
                    <button type="submit" class="auth-submit"><span data-submit-label>Masuk</span><span aria-hidden="true">→</span></button>
                </form>
                <div class="auth-divider"><span>atau</span></div>

                <a href="{{ route('auth.google') }}" class="auth-google">
                    <svg width="20" height="20" viewBox="0 0 48 48" aria-hidden="true"><path fill="#FFC107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4 12.955 4 4 12.955 4 24s8.955 20 20 20 20-8.955 20-20c0-1.341-.138-2.65-.389-3.917z"/><path fill="#FF3D00" d="m6.306 14.691 6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4 16.318 4 9.656 8.337 6.306 14.691z"/><path fill="#4CAF50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.91 11.91 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44z"/><path fill="#1976D2" d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917z"/></svg>
                    <span>Masuk dengan Google</span>
                </a>
                <p class="auth-switch">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
            </div>
        </section>

        <aside class="auth-visual auth-login-visual">
            <img src="{{ asset('img/Kids1.png') }}" alt="Anak-anak melakukan eksperimen sains" class="auth-visual-image">
            <p class="auth-visual-caption">“Belajar adalah jalan mengenal Allah”</p>
        </aside>
    </main>
</x-auth.layout>
