<x-auth.layout title="Daftar">
    <main class="auth-shell auth-register-shell">
        <section class="auth-register-card">
            <aside class="auth-visual auth-register-visual">
                <img src="{{ asset('img/Kids1.png') }}" alt="Anak-anak melakukan eksperimen sains" class="auth-visual-image">
                <div class="auth-register-quote">
                    <span aria-hidden="true">“</span>
                    <p>Menjelajahi alam semesta dan segala isinya adalah cara terbaik untuk mengenalkan kebesaran penciptaan-Nya kepada anak-anak.</p>
                    <small>Amma Science Kids<br>Komunitas Edukasi</small>
                </div>
            </aside>

            <section class="auth-register-content">
                <a href="{{ route('home') }}" class="auth-home-link">
                    <span aria-hidden="true">←</span> Kembali ke Beranda
                </a>
                <a href="{{ route('home') }}" class="auth-register-brand">Amma Science Kids</a>
                <div class="auth-copy auth-register-copy">
                    <h1>Bergabung dengan Komunitas<br>Ilmuwan Cilik</h1>
                    <p>Daftar untuk mulai menjelajahi kebesaran Allah melalui sains.</p>
                </div>

                <form method="POST" action="{{ route('register.store') }}" class="auth-form auth-register-form" data-auth-form>
                    @csrf
                    <div class="auth-field">
                        <label for="name">Nama Lengkap</label>
                        <div class="auth-input-wrap"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="8" r="3"/><path d="M5.5 19c.7-3.1 3-5 6.5-5s5.8 1.9 6.5 5"/></svg><input id="name" name="name" type="text" value="{{ old('name') }}" autocomplete="name" placeholder="Masukkan nama lengkap Anda" required autofocus></div>
                        @error('name') <p class="auth-error">{{ $message }}</p> @enderror
                    </div>
                    <div class="auth-field">
                        <label for="email">Email</label>
                        <div class="auth-input-wrap"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3.75 5.25h16.5v13.5H3.75zM4.5 6l7.5 5.5L19.5 6"/></svg><input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" placeholder="contoh@email.com" required></div>
                        @error('email') <p class="auth-error">{{ $message }}</p> @enderror
                    </div>
                    <div class="auth-field">
                        <label for="whatsapp_number">Nomor WhatsApp</label>
                        <div class="auth-input-wrap"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 3.5 4.5 5c-.7.4-1 1.2-.7 2 2.2 6 5 8.8 11 11 .8.3 1.6 0 2-.7l1.5-2.5-3.2-2-1.6 1.6c-1.8-.9-3.6-2.7-4.5-4.5L10.6 8 7 3.5Z"/></svg><input id="whatsapp_number" name="whatsapp_number" type="tel" value="{{ old('whatsapp_number') }}" autocomplete="tel" placeholder="081234567890" required></div>
                        @error('whatsapp_number') <p class="auth-error">{{ $message }}</p> @enderror
                    </div>
                    <div class="auth-field">
                        <label for="password">Kata Sandi</label>
                        <div class="auth-input-wrap"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="10" width="14" height="10" rx="1"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg><input id="password" name="password" type="password" autocomplete="new-password" placeholder="Minimal 8 karakter" required><button type="button" class="auth-password-toggle" data-password-toggle="password" aria-label="Tampilkan kata sandi"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"/><circle cx="12" cy="12" r="2.5"/></svg></button></div>
                        @error('password') <p class="auth-error">{{ $message }}</p> @enderror
                    </div>
                    <div class="auth-field">
                        <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                        <div class="auth-input-wrap"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="10" width="14" height="10" rx="1"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg><input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" placeholder="Ulangi kata sandi" required></div>
                    </div>
                    <button type="submit" class="auth-submit"><span data-submit-label>Daftar Sekarang</span><span aria-hidden="true">→</span></button>
                </form>
                <div class="auth-divider"><span>atau</span></div>

                <a href="{{ route('auth.google') }}" class="auth-google">
                    <svg width="20" height="20" viewBox="0 0 48 48" aria-hidden="true"><path fill="#FFC107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4 12.955 4 4 12.955 4 24s8.955 20 20 20 20-8.955 20-20c0-1.341-.138-2.65-.389-3.917z"/><path fill="#FF3D00" d="m6.306 14.691 6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4 16.318 4 9.656 8.337 6.306 14.691z"/><path fill="#4CAF50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.91 11.91 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44z"/><path fill="#1976D2" d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917z"/></svg>
                    <span>Daftar dengan Google</span>
                </a>
                <p class="auth-switch">Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
                <p class="auth-terms">Dengan mendaftar, Anda menyetujui <a href="#">Syarat & Ketentuan</a> serta <a href="#">Kebijakan Privasi</a> kami.</p>
            </section>
        </section>
    </main>
</x-auth.layout>
