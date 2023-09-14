<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'num_ref' => 'ORDER' . uniqid(),
            'user_id' => User::role('customer')->first()->id,
            'cart_id' => 1,
            'type' => 'online',
            'status' => 'pending',
            'total' => fake()->numberBetween(500, 1000)
        ];
    }
}
