<?php

namespace Domain\Products\Factories;

use Domain\Products\Models\Product;
use Domain\Products\Models\ProductPreset;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductPreset>
 */
class ProductPresetFactory extends Factory
{

    protected $model = ProductPreset::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'product_id' => Product::factory(),
            'created_by' => 1,
            'updated_by' => 1
        ];
    }
}
