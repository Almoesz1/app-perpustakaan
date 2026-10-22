# Dokumentasi REST API Perpustakaan Digital

Berikut adalah daftar *endpoint* REST API yang tersedia untuk aplikasi ini:

| Method | URL | Body (JSON) | Keterangan & Contoh Response (200 OK / 201 Created) |
|---|---|---|---|
| **GET** | `/api/books` | - | Mengambil daftar buku beserta pagination.<br> `{"data": [{"id": 1, "judul": "Laskar Pelangi", "category": {"id": 1, "nama_kategori": "Fiksi"}}], "links": {...}, "meta": {...}}` |
| **GET** | `/api/books/{id}` | - | Mengambil detail 1 buku.<br> `{"data": {"id": 1, "judul": "Laskar Pelangi", "penulis": "Andrea Hirata", "category": {...}}}` |
| **POST** | `/api/books` | `{"judul": "X", "penulis": "Y", "penerbit": "Z", "tahun_terbit": 2023, "stok": 5, "category_id": 1}` | *(Status 201)* Menambahkan buku baru.<br> `{"data": {"id": 4, "judul": "X", "category": {...}}}`<br>*(Status 422)* Jika validasi gagal: `{"message": "Judul wajib diisi...", "errors": {"judul": [...]}}` |
| **PUT** | `/api/books/{id}` | Sama dengan POST | Mengubah data buku.<br> `{"data": {"id": 1, "judul": "Judul Baru", ...}}` |
| **DELETE** | `/api/books/{id}` | - | Menghapus buku.<br> `{"message": "Buku berhasil dihapus."}` |
| **GET** | `/api/members` | - | Mengambil daftar anggota (dengan pagination).<br> `{"data": [{"id": 1, "nama": "Siti", "nim": "31256..."}], "meta": {...}}` |
| **GET** | `/api/members/{id}` | - | Mengambil detail 1 anggota.<br> `{"data": {"id": 1, "nama": "Siti", "nim": "31256..."}}` |
| **GET** | `/api/loans` | - | Mengambil daftar transaksi peminjaman (dengan pagination).<br> `{"data": [{"id": 1, "member": {"id":1, "nama":"Siti"}, "status": "dipinjam"}], "meta": {...}}` |
| **POST** | `/api/loans` | `{"member_id": 1, "user_id": 2, "tanggal_pinjam": "2026-10-22", "tanggal_kembali": "2026-10-29", "book_ids": [1, 2]}` | *(Status 201)* Membuat transaksi baru.<br> `{"data": {"id": 3, "member": {...}, "status": "dipinjam", "books": [{"id":1, "judul": "Laskar Pelangi"}]}}` |
| **PUT** | `/api/loans/{id}/kembalikan`| - | Mengubah status transaksi menjadi 'dikembalikan'.<br> `{"data": {"id": 1, "status": "dikembalikan", "tanggal_dikembalikan": "2026-10-22"}}` |
| **GET** | `/api/stats` | - | Mendapatkan ringkasan statistik aplikasi.<br> `{"total_buku": 15, "total_anggota": 30, "peminjaman_aktif": 5}` |