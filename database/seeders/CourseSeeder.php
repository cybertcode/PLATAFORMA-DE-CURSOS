<?php

namespace Database\Seeders;

use App\Models\admin\Goal;
use App\Models\admin\Image;
use App\Models\admin\Course;
use App\Models\admin\Lesson;
use App\Models\admin\Section;
use App\Models\admin\Audience;
use Illuminate\Database\Seeder;
use App\Models\admin\Description;
use App\Models\admin\Requirement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::factory(40)->create(); //Generados 40 registros de curso primero
        //Descargamos las imagesn en la tabla images
        foreach ($courses as $course) {
            Image::factory(1)->create([
                'imageable_id' => $course->id,
                'imageable_type' => 'App\Models\admin\Course',
            ]);
            Requirement::factory(4)->create([
                'course_id' => $course->id
            ]);
            Goal::factory(4)->create([
                'course_id' => $course->id
            ]);
            Audience::factory(4)->create([
                'course_id' => $course->id
            ]);
            $sections = Section::factory(4)->create(['course_id' => $course->id]);
            foreach ($sections as $section) {
                $lessons = Lesson::factory(4)->create(['section_id' => $section->id]);
                foreach ($lessons as $lesson) {
                    Description::factory(1)->create(['lesson_id' => $lesson->id]);
                }
            }
        }
    }
}