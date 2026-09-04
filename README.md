# Aplikasi Perpustakaan Digital Kampus

Sistem Perpustakaan Digital Kampus dibangun menggunakan Laravel 12 untuk mengelola data buku, anggota, dan transaksi peminjaman.

## Cara Menjalankan Project
1. Clone repository: `git clone https://github.com/Almoesz1/app-perpustakaan.git`
2. Jalankan `composer install`
3. Konfigurasi database di `.env` (`DB_DATABASE=db_perpustakaan`)
4. Jalankan server: `php artisan serve`

## Pemahaman Konsep MVC (Model-View-Controller)
- **Model**: Mengelola data, relasi antar tabel, dan aturan bisnis database.
- **View**: Menangani tampilan antarmuka (UI) menggunakan file Blade HTML yang dilihat oleh pengguna.
- **Controller**: Bertindak sebagai jembatan yang menerima HTTP Request, memproses data via Model, lalu mengembalikan data ke View.