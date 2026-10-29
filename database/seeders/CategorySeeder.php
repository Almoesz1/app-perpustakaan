<?php
namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nama_kategori' => 'Novel', 'deskripsi' => 'Buku fiksi panjang...'],
            ['nama_kategori' => 'Komik', 'deskripsi' => 'Buku bergambar cerita.'],
            ['nama_kategori' => 'Sains', 'deskripsi' => 'Buku seputar ilmu pengetahuan alam.'],
            ['nama_kategori' => 'Teknologi', 'deskripsi' => 'Buku seputar pemrograman, komputer.'],
            ['nama_kategori' => 'Sejarah', 'deskripsi' => 'Buku seputar peristiwa sejarah.'],
        ];
        foreach ($categories as $category) {
            Category::updateOrCreate(['nama_kategori' => $category['nama_kategori']], $category);
        }
    }
}