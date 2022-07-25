<?php

namespace App\Http\Livewire\Frontend\Course;

use Livewire\Component;
use App\Models\admin\Course;

class CourseStatus extends Component
{
    public $course;
    public function mount(Course $course)
    {
        $this->course = $course;
    }
    public function render()
    {

        return view('livewire.frontend.course.course-status');
    }
}