<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nim' => fake('id_ID')->unique()->bothify('?0########'),
            'nama' => fake('id_ID')->name(),
            'alamat' => fake('id_ID')->address(),
            'fakultas' => fake('id_ID')->randomElement([
                    'Matematika dan Ilmu Pengetahuan Alam',
                    'Hukum',
                    'Kedokteran',
                    'Kedokteran Gigi',
                    'Ekonomi dan Bisnis',
                    'Kesehatan Masyarakat',
                    'Ilmu Kelautan dan Perikanan',
                    'Ilmu Sosial dan Politik',
                    'Kehutanan',
                    'Peternakan',
                    'Ilmu Budaya',
                    'Teknik',
                    'Pertanian',
                    'Kesehatan Masyarakat',
                    'Keperawatan',
                    'Farmasi'
            ]),
        ];
    }
}
