<?php

namespace Database\Factories\admin;

use App\Models\admin\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

// require_once '/vendor/autoload.php';
// $faker = Faker\Factory::create();
// $faker->addProvider(new \Mmo\Faker\PicsumProvider($faker));
// $faker->addProvider(new \Mmo\Faker\LoremSpaceProvider($faker));

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // protected $model = Image::class;
    public function definition()
    {
        // Primera forma
        // $faker = \Faker\Factory::create();
        // $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        // Segunda alternative
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Mmo\Faker\PicsumProvider($faker));
        $faker->addProvider(new \Mmo\Faker\LoremSpaceProvider($faker));
        return [
            // 'url' => 'cursos/' . $this->faker->image('public/storage/cursos', 640, 480, null), //No funciona
            // Primera forma
            // 'url' => 'cursos/' . $faker->image('public/storage/cursos', 640, 480, false),
            // Segunda forma
            'url' => 'courses/' . $faker->picsum('public/storage/courses', 640, 480, false), //true para guardar la ruta completa
            // 'imageable_id' => null, //optional porque se agrega dinámicamente
            // 'imageable_type' => null //optional porque se agrega dinámicamente
        ];
    }
}