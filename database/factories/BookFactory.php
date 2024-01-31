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



    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'genre' => $this->faker->word,
            'description' => $this->faker->text(255),
            'image' => $this->faker->imageUrl(),
            'publication_year' => $this->faker->date,
            'total_copies' => $this->faker->numberBetween(50, 200),
            'available_copies' => $this->faker->numberBetween(20, 100),
        ];
    }
}
