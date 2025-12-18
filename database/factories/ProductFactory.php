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
            'name' => fake()->words(3, true), // 3 words, true to return the number of words as a string instead of array
            'description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 10, 100), // 2 decimals, range 10 >= price <= 100
            'stock' => fake()->numberBetween(0, 100), // range 0 >= stock <= 100
        ];
    }
}
