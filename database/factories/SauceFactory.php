<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sauce>
 */
class SauceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->unique()->numberBetween(1, 10000),
            'userId' => User::all()->random()->id,
            'name' => fake()->name(),
            'manufacturer' => fake()->name(),
            'description' => fake()->text(200),
            'mainPepper' => fake()->word(),
            'imageUrl' => fake()->imageUrl(),
            'heat' => fake()->numberBetween(1, 10),
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => null,
            'usersDisliked' => null
        ];
    }
}
