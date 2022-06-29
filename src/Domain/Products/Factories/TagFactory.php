<?php

namespace Domain\Products\Models\Factories;

use Domain\Products\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    protected $model = Tag::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement(['pets', 'superheroes', 'girl power', 'fitness', 'love', 'rides']),
            'created_by' => 1,
            'updated_by' => 1
        ];
    }
}
