<?php

namespace App\Http\Livewire\Frontend\Course;

use Livewire\Component;
use App\Models\admin\Course;

class CourseStatus extends Component
{
    public $course;
    public $current;
    public function mount(Course $course)
    {
        $this->course = $course;
        foreach ($course->lessons as  $lesson) {
            if (!$lesson->completed) {
                $this->current = $lesson;
                break;
            }
        }
    }
    public function render()
    {

        return view('livewire.frontend.course.course-status');
    }
}