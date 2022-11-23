<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tokobuku>
 */
class tokobukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //dat dummy
        return [
            'judul' => fake()->words(mt_rand(5, 10), true),
            'penerbit' => fake()->company(),
            'genre' => fake()->city(),
            'pengarang' => fake()->name(),
            'isbnbuku' => fake()->unique()->phoneNumber(),
            'harga' => fake()->postcode()
        ];
    }
}
