<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emprunt>
 */
class EmpruntFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence,
            'date_emprunt' => $this->faker->date,
            'return_date' => $this->faker->date,
            'is_returned' => $this->faker->boolean,
            'user_id' => rand(1, 10),
            'book_id' => rand(1, 10),
        ];
    }
}
