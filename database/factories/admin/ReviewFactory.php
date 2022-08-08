<?php

namespace Database\Factories\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->text(),
            'rating' => $this->faker->randomElement([3, 4, 5]),
            'user_id' => User::all()->random()->id,

        ];
    }
}