<?php
namespace Database\Factories;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected array $judulPerKategori = [
        'Novel' => ['Laskar Pelangi', 'Bumi Manusia', 'Negeri 5 Menara', 'Ayat-Ayat Cinta'],
        'Komik' => ['Si Juki', 'Garudayana', 'Wonder Wayang'],
        'Sains' => ['Pengantar Fisika Dasar', 'Kimia Organik', 'Biologi Sel'],
        'Teknologi' => ['Dasar PHP', 'Algoritma', 'Jaringan Komputer'],
        'Sejarah' => ['Sejarah Indonesia', 'Perang Diponegoro'],
    ];
    protected array $penerbit = ['Gramedia', 'Mizan', 'Bentang Pustaka', 'Erlangga', 'Informatika Bandung'];

    public function definition(): array
    {
        $category = Category::inRandomOrder()->first();
        $pool = $this->judulPerKategori[$category?->nama_kategori] ?? $this->judulPerKategori['Novel'];
        return [
            'judul' => fake()->randomElement($pool),
            'penulis' => fake()->name(),
            'penerbit' => fake()->randomElement($this->penerbit),
            'tahun_terbit' => fake()->numberBetween(1990, (int) date('Y')),
            'isbn' => fake()->unique()->isbn13(),
            'stok' => fake()->numberBetween(1, 10),
            'category_id' => $category?->id,
        ];
    }
}