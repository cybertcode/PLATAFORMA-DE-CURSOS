<?php

namespace App\Http\Livewire\Frontend\Instructor;

use Livewire\Component;
use App\Models\admin\Course;

class CoursesCurriculum extends Component
{
    public $course;
    public function mount(Course $course)
    {
        $this->course = $course;
    }
    public function render()
    {
        // return view('livewire.frontend.instructor.courses-curriculum');original
        // Por defecto extiende la plantilla resources\views\layouts\app.blade.php nosotros le cambiamos para que extienda la otra plantilla personalizada por nosotros
        return view('livewire.frontend.instructor.courses-curriculum')->layout('layouts.instructor');
    }
}