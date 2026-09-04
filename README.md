# App Perpustakaan Digital Kampus

Aplikasi web manajemen perpustakaan kampus berbasis Laravel 12 untuk mengelola data buku, anggota, dan transaksi peminjaman.

## Cara Menjalankan Project Secara Lokal
1. Clone repository: `git clone https://github.com/Almoesz1/app-perpustakaan.git`
2. Masuk ke direktori: `cd app-perpustakaan`
3. Install dependency: `composer install`
4. Konfigurasi file `.env` (pastikan PostgreSQL berjalan dan database `db_perpustakaan` sudah dibuat)
5. Jalankan server development: `php artisan serve`
6. Akses aplikasi di browser: `http://127.0.0.1:8000`

## Pemahaman Konsep MVC (Model-View-Controller)
- **Model**: Mengelola struktur data, aturan bisnis, dan interaksi langsung dengan tabel database.
- **View**: Bertanggung jawab menampilkan antarmuka pengguna (UI) dalam bentuk template HTML/Blade tanpa memuat logika bisnis rumit.
- **Controller**: Bertindak sebagai jembatan penghubung yang menerima permintaan pengguna (request), memproses logika melalui Model, lalu mengirimkan hasilnya ke View.