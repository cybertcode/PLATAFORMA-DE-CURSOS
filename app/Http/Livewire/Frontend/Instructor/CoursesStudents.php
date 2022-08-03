<?php

namespace App\Http\Livewire\Frontend\Instructor;

use App\Models\admin\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesStudents extends Component
{
    use WithPagination;
    public $course, $search;
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function mount(Course $course)
    {
        $this->course = $course;
    }
    public function render()
    {
        $students = $this->course->students()->where('name', 'LIKE', '%' . $this->search . '%')->paginate(4);
        return view('livewire.frontend.instructor.courses-students', compact('students'))->layout('layouts.instructor');
    }
}