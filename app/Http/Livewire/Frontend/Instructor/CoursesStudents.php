<?php

namespace App\Http\Livewire\Frontend\Instructor;

use App\Models\admin\Course;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesStudents extends Component
{
    use AuthorizesRequests; //Para usar el policy del CoursePolicy
    use WithPagination;
    public $course, $search;
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function mount(Course $course)
    {
        $this->course = $course;
        // Usamos nuestro método de autorización creado en el CoursePolicy|
        $this->authorize('dicatated', $course);

    }
    public function render()
    {
        $students = $this->course->students()->where('name', 'LIKE', '%' . $this->search . '%')->paginate(4);
        return view('livewire.frontend.instructor.courses-students', compact('students'))->layout('layouts.instructor');
    }
}