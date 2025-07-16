<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_name' => fake()->word(),
            'description' => fake()->word(),
            'exchange_item_for' => fake()->word(),
            'image_url' => fake()->imageUrl(),
            'user_id' => User::inRandomOrder()->first()->id, // Assuming you want to link the item to a random user
        ];
    }
}
