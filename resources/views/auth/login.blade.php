<x-auth.layout title="Masuk">
    <main class="auth-shell auth-login-shell">
        <section class="auth-login-panel">
            <div class="auth-login-content">
                <a href="{{ route('home') }}" class="auth-brand" aria-label="Kembali ke beranda Amma Science Kids">
                    <img src="{{ asset('img/Logo.png') }}" alt="" class="auth-brand-mark">
                    <span>Amma Science<br>Kids<span class="auth-brand-dot">.</span></span>
                </a>

                <div class="auth-copy auth-login-copy">
                    <h1>Selamat Datang<br>Kembali</h1>
                    <p>Masuk untuk melanjutkan<br>petualangan sains si kecil.</p>
                </div>

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
                            <span class="auth-muted-link">Lupa Kata Sandi?</span>
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

                <p class="auth-switch">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
            </div>
        </section>

        <aside class="auth-visual auth-login-visual">
            <img src="{{ asset('img/Kids1.png') }}" alt="Anak-anak melakukan eksperimen sains" class="auth-visual-image">
            <p class="auth-visual-caption">“Belajar adalah jalan mengenal Allah”</p>
        </aside>
    </main>
</x-auth.layout>
