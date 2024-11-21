<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Movie;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => ucwords($this->faker->words(rand(2, 5), true)),
            'director' => $this->faker->name,
            'release_year' => $this->faker->year($max = 'now'),
            'rating' => $this->faker->randomFloat(1, 0, 10), // Rating between 0.0 and 10.0
            'description' => $this->faker->paragraph,
        ];
    }
}
