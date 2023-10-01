<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'last_name' => fake()->lastName(),
            'middle_name' => fake()->randomLetter(),
            'first_name' => fake()->firstName(),
            'age' => fake()->numberBetween(1, 60),
            'sex' => fake()->randomElement(['male', 'female']),
            'phone' => fake()->phoneNumber(),
            'block' =>  fake()->randomElement(['1 blk', '2 blk', '3 blk']),
            'lot' => fake()->randomElement(['1 lt', '2 lt', '3 lt']),
            'street' => fake()->randomElement(['1 street', '2 street', '3 street']),
            'municipality' => fake()->randomElement(['1 municipality', '2 municipality', '3 municipality']),
            'barangay' => fake()->randomElement(['1 barangay', '2 barangay', '3 barangay']),
            'subdivision' => fake()->randomElement(['1 subdivision', '2 subdivision', '3 subdivision']),
            'region' =>  fake()->randomElement(['1 region', '2 region', '3 region']),
            'zip_code' => fake()->countryCode(),
            'user_id' => fake()->numberBetween(1, User::count())
        ];
    }
}
