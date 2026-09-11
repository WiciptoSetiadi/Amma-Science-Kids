# Amma Science Kids

Website untuk **Amma Science Kids**, sebuah platform edukasi sains untuk anak-anak dengan pendekatan *Experiential Learning* dan nilai-nilai tauhid. 
Website ini dibangun menggunakan **Laravel** dan **Tailwind CSS v4** (melalui Vite).

---

## 🚀 Cara Menjalankan Proyek secara Lokal

Ikuti langkah-langkah di bawah ini untuk menjalankan website ini di komputer Anda (local environment).

### Persyaratan Sistem
Pastikan Anda sudah menginstal aplikasi berikut di komputer Anda:
- [PHP](https://www.php.net/downloads.php) (Minimal versi 8.2)
- [Composer](https://getcomposer.org/) (Untuk manajemen dependensi PHP)
- [Node.js & npm](https://nodejs.org/) (Untuk manajemen dependensi Frontend)

### Langkah-langkah Instalasi

1. **Clone repository ini** (jika belum):
   ```bash
   git clone https://github.com/WiciptoSetiadi/Amma-Science-Kids.git
   cd Amma-Science-Kids
   ```

2. **Instal dependensi PHP (Laravel):**
   Jalankan perintah ini di terminal untuk mengunduh semua paket backend.
   ```bash
   composer install
   ```

3. **Instal dependensi Frontend (Node.js/Tailwind):**
   Jalankan perintah ini untuk mengunduh paket frontend (Vite, Tailwind, dll).
   ```bash
   npm install
   ```

4. **Siapkan file konfigurasi environment (`.env`):**
   Salin file `.env.example` dan ubah namanya menjadi `.env`.
   - Jika Anda menggunakan Windows (Command Prompt/PowerShell):
     ```bash
     copy .env.example .env
     ```
   - Jika Anda menggunakan macOS/Linux (Bash):
     ```bash
     cp .env.example .env
     ```

5. **Generate Application Key:**
   Langkah ini wajib dilakukan untuk enkripsi keamanan aplikasi Laravel.
   ```bash
   php artisan key:generate
   ```

6. **Konfigurasi Database:**
   Pastikan Anda sudah memiliki database MySQL/MariaDB yang siap digunakan (misal dengan nama `ammascience-kids`). Buka file `.env` dan sesuaikan pengaturan database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ammascience-kids
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. **Jalankan Migrasi Database:**
   Aplikasi ini membutuhkan struktur database untuk artikel, program, galeri, dll. Jalankan perintah ini:
   ```bash
   php artisan migrate
   ```

8. **Tautkan Storage (Storage Link):**
   Wajib dilakukan agar gambar yang diunggah melalui panel Admin dapat diakses secara publik.
   ```bash
   php artisan storage:link
   ```

9. **Buat Akun Admin (Filament):**
   Aplikasi ini menggunakan panel admin Filament v3. Buat user pertama Anda dengan perintah:
   ```bash
   php artisan make:filament-user
   ```
   *(Ikuti instruksi di terminal untuk mengisi nama, email, dan password admin)*

10. **Kompilasi aset frontend (CSS & JavaScript):**
    Agar tampilan Tailwind CSS dan efek-efek lainnya berfungsi, jalankan proses build Vite:
    ```bash
    npm run build
    ```
    *(Catatan: Saat proses pengembangan (development), Anda bisa menggunakan perintah `npm run dev` agar CSS otomatis diperbarui setiap kali Anda menyimpan file).*

11. **Jalankan server lokal Laravel:**
    Terakhir, hidupkan server PHP bawaan Laravel.
    ```bash
    php artisan serve
    ```

### 🌍 Mengakses Website
Setelah server berjalan, buka browser web Anda dan kunjungi alamat berikut:
- **Halaman Publik:** [http://localhost:8000](http://localhost:8000)
- **Panel Admin:** [http://localhost:8000/admin](http://localhost:8000/admin) (Gunakan email dan password dari langkah 9 untuk login)
