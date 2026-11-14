<x-auth.layout title="Atur Ulang Kata Sandi">
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
                    <h1>Atur Ulang<br>Kata Sandi</h1>
                    <p>Masukkan kata sandi baru untuk akun Amma Science Kids Anda.</p>
                </div>

                <form method="POST" action="{{ route('password.update') }}" class="auth-form" data-auth-form>
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="auth-field">
                        <label for="email">Email</label>
                        <div class="auth-input-wrap">
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3.75 5.25h16.5v13.5H3.75zM4.5 6l7.5 5.5L19.5 6"/></svg>
                            <input id="email" name="email" type="email" value="{{ old('email', $email) }}" autocomplete="email" placeholder="nama@email.com" required autofocus>
                        </div>
                        @error('email') <p class="auth-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="auth-field">
                        <label for="password">Kata Sandi Baru</label>
                        <div class="auth-input-wrap">
                            <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="10" width="14" height="10" rx="1"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>
                            <input id="password" name="password" type="password" autocomplete="new-password" placeholder="Minimal 8 karakter" required>
                            <button type="button" class="auth-password-toggle" data-password-toggle="password" aria-label="Tampilkan kata sandi">
                                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"/><circle cx="12" cy="12" r="2.5"/></svg>
                            </button>
                        </div>
                        @error('password') <p class="auth-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="auth-field">
                        <label for="password_confirmation">Konfirmasi Kata Sandi Baru</label>
                        <div class="auth-input-wrap">
                            <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="10" width="14" height="10" rx="1"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>
                            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" placeholder="Ulangi kata sandi baru" required>
                        </div>
                    </div>

                    <button type="submit" class="auth-submit" style="margin-top: 24px;">
                        <span data-submit-label>Simpan Kata Sandi</span>
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

