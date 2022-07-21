<?php

namespace App\Http\Livewire\Frontend\Course;

use Livewire\Component;
use App\Models\admin\Course;

class CourseIndex extends Component
{
    public function render()
    {
        $courses = Course::where('status', 3)->latest('id')->paginate(8);
        return view('livewire.frontend.course.course-index', compact('courses'));
    }
}