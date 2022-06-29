<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TourPage>
 */
class TourPageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'background_color' => $this->faker->hexColor(),
            'title' => $this->faker->unique()->randomElement(['Get Inspired', 'Eat & Healthy', 'Save Favourites']),
            'subtitle' => $this->faker->realText(),
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
    }
}
