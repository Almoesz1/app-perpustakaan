<?php
namespace Database\Seeders;
use App\Models\{Book, Loan, Member, User};
use Illuminate\Database\Seeder;

class LoanSeeder extends Seeder
{
    public function run(): void
    {
        $memberIds = Member::pluck('id'); $userIds = User::pluck('id'); $bookIds = Book::pluck('id');
        for ($i = 0; $i < 10; $i++) {
            $tglPinjam = now()->subDays(fake()->numberBetween(1, 30));
            $tglKembali = $tglPinjam->copy()->addDays(7);
            $status = fake()->randomElement(['dipinjam', 'dikembalikan', 'terlambat']);
            
            $loan = Loan::create([
                'member_id' => $memberIds->random(), 'user_id' => $userIds->random(),
                'tanggal_pinjam' => $tglPinjam->toDateString(), 'tanggal_kembali' => $tglKembali->toDateString(),
                'tanggal_dikembalikan' => $status === 'dikembalikan' ? $tglKembali->copy()->subDays(fake()->numberBetween(0, 3))->toDateString() : null,
                'status' => $status,
            ]);
            $bookIds->random(fake()->numberBetween(1, 3))->each(fn ($bId) => $loan->loanItems()->create(['book_id' => $bId]));
        }
    }
}