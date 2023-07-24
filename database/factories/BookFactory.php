<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(1, 4)),
            'category_id' => $this->faker->numberBetween(1, 12),
            'description' => $this->faker->paragraph(3),
            'amount' => $this->faker->numberBetween(30, 1000),
            'book' => 'dummyone.pdf',
            'cover' => 'blankcover.jpg',
            'created_by' => $this->faker->numberBetween(3, 7),
        ];
    }
}
