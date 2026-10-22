<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat User Petugas/Admin langsung di sini
        User::create([
            'name' => 'Petugas Perpustakaan',
            'email' => 'petugas@perpustakaan.com',
            'password' => Hash::make('password123'),
            'role' => 'petugas',
        ]);

        // 2. Buat Data Kategori
        $catFiksi = Category::create([
            'nama_kategori' => 'Fiksi',
            'deskripsi' => 'Buku cerita rekaan seperti novel dan kumpulan cerpen.',
        ]);
        $catTeknologi = Category::create([
            'nama_kategori' => 'Teknologi',
            'deskripsi' => 'Buku seputar teknologi, pemrograman, dan ilmu komputer.',
        ]);

        // 3. Buat Data Buku
        Book::create([
            'judul' => 'Laskar Pelangi',
            'penulis' => 'Andrea Hirata',
            'penerbit' => 'Bentang Pustaka',
            'tahun_terbit' => 2005,
            'isbn' => '9789793062792',
            'stok' => 5,
            'category_id' => $catFiksi->id,
        ]);
        Book::create([
            'judul' => 'Clean Code',
            'penulis' => 'Robert C. Martin',
            'penerbit' => 'Prentice Hall',
            'tahun_terbit' => 2008,
            'isbn' => '9780132350884',
            'stok' => 7,
            'category_id' => $catTeknologi->id,
        ]);

        // 4. Buat Data Anggota
        Member::create([
            'nama' => 'Siti Aminah',
            'nim' => '3125600001',
            'email' => 'siti@eepis.ac.id',
            'nomor_telepon' => '081234567890',
            'alamat' => 'Surabaya',
            'status' => 'aktif',
        ]);
        Member::create([
            'nama' => 'Budi Santoso',
            'nim' => '3125600002',
            'email' => 'budi@eepis.ac.id',
            'nomor_telepon' => '089876543210',
            'alamat' => 'Sidoarjo',
            'status' => 'aktif',
        ]);
    }
}
