<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rate>
 */
class RateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(20),
            'full_round_rate' => fake()->randomFloat(2, 50.00, 100.00),
            'half_round_rate' => fake()->randomFloat(2, 50.00, 100.00),
            'twilight_rate' => fake()->randomFloat(2, 50.00, 100.00),
            'course_id' => null,
        ];
    }
}
