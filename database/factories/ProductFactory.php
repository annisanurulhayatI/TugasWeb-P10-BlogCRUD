<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
            'category_id' => null,
            'user_id' => null,
            'name' => fake()->unique()->words(3, true),
            'description' => fake()->sentence(12),
            'price' => fake()->numberBetween(10000, 2000000),
            'stock' => fake()->numberBetween(1, 100),
            'published' => fake()->boolean(90),
        ];
    }
}