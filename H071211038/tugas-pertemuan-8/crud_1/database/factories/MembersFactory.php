<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MembersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nama =  fake()->firstName()." ".fake()->lastName();

        return [
            'nama' => $nama,
            'akun_fb' => $nama,
            'email' => fake()->unique()->email(),
            'regional' => fake()->city(),
            'tahun' => fake()->numberBetween(2012, 2021),
        ];
    }
}
