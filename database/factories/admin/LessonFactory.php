<?php

namespace Database\Factories\admin;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'   => $this->faker->sentence(),
            'url'    => 'https://youtu.be/0g326EbhO7E',
            'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/0g326EbhO7E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'platform_id'    => 1,
        ];
    }
}
