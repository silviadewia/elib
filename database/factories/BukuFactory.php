 <?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kategori' => 'ebook',
            'rak' => fake('id_ID'),
            'pengarang' => fake()->name(),
            'penerbit' => fake()->name(),
            'judul_buku' => fake()->name(),
            'tahun_buku' => fake()->year(),
            'jumlah_buku' => fake()->numberBetween(1, 100),
            'isbn' => fake()->isbn10(),
            'sampul' => fake()->imageUrl(640, 480),
            'pinjam' => fake()->numberBetween(1, 100),
            'lampiran_buku' => fake()->text(25),
            'keterangan_lain' => fake()->text(25),
            'dibuat_oleh' => 'Silvia'
        ];
    }
}
