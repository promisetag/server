<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->randomElement(['My Personal Promise', 'My Love', 'My Squad']),
            'description' => $this->faker->realText(),
            'image_url' => $this->faker->imageUrl(),
            'background_color' => $this->faker->hexColor(),
            'background_image_url' => sprintf("https://picsum.photos/seed/%s/1080/1920", $this->faker->unique()->word()),
            'tag_quantity' => static function($attributes) {
                return match ($attributes['title']) {
                    'My Love' => 2,
                    default => 1
                };
            },
            'storage_space_quantity' => 120,
            'storage_space_unit' => 'Mb',
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
