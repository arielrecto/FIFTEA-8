<?php

namespace Database\Factories;

use App\Models\Product;
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
            'image' => fake()->imageUrl(),
            'name' => fake()->name(),
            'description' => fake()->sentence(),
            'sizes' => '[{"name":"Large","price":"500"},{"name":"Medium","price":"400"},{"name":"Extra Large","price":"600"}]',
            'price' => fake()->numberBetween($min = 1500, $max = 6000)
        ];
    }
}
