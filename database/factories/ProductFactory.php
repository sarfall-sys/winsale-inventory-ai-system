<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word().' '.$this->faker->unique()->numberBetween(100, 999),
            'category_id' => \App\Models\Category::factory()->create()->id,
            'cost_price' => $this->faker->randomFloat(2, 1, 90),
            'sel_price' => $this->faker->randomFloat(2, 1, 150),
            'stock' => $this->faker->numberBetween(0, 500),
            'min_stock' => $this->faker->numberBetween(10, 70),
            'image_path' => null,
        ];
    }
}
