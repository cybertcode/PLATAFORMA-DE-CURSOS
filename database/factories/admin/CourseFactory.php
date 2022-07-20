<?php

namespace Database\Factories\admin;

use App\Models\User;
use App\Models\admin\Level;
use App\Models\admin\Price;
use Illuminate\Support\Str;
use App\Models\admin\Course;
use App\Models\admin\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        return [
            'title'       => $title,
            'subtitle'    => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status'      => $this->faker->randomElement([Course::BORRADOR, Course::REVISION, Course::PUBLICADO]),
            'slug'        => Str::slug($title),
            'user_id'     => User::all()->random()->id,
            'level_id'    => Level::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'price_id'    => Price::all()->random()->id,
        ];
    }
}