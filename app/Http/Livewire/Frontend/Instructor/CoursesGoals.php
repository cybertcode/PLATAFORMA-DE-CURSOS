<?php

namespace App\Http\Livewire\Frontend\Instructor;

use App\Models\admin\Course;
use App\Models\admin\Goal;
use Livewire\Component;

class CoursesGoals extends Component
{
    public $course, $goal, $name;
    // Para sincronizar y validar los inputs
    protected $rules = ['goal.name' => ['required']];
    public function mount(Course $course)
    {
        $this->course = $course;
        $this->goal = new Goal();
    }
    public function render()
    {

        return view('livewire.frontend.instructor.courses-goals');
    }
    public function store()
    {
        $this->validate(['name' => ['required']]);
        $this->course->goals()->create(['name' => $this->name]);
        $this->reset('name');
        $this->course = Course::find($this->course->id);
    }
    public function edit(Goal $goal)
    {
        $this->goal = $goal;
    }
    public function update()
    {
        $this->validate();
        $this->goal->save();
        //borramos la información de la propiedad goal
        $this->goal = new Goal();
        //Actualizamos la información del curso
        $this->course = Course::find($this->course->id);
    }
    public function destroy(Goal $goal)
    {
        $goal->delete();
        //Actualizamos la información del curso
        $this->course = Course::find($this->course->id);

    }
}