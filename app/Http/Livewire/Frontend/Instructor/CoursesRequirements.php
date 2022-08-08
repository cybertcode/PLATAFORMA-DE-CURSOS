<?php

namespace App\Http\Livewire\Frontend\Instructor;

use App\Models\admin\Course;
use App\Models\admin\Requirement;
use Livewire\Component;

class CoursesRequirements extends Component
{
    public $course, $requirement, $name;
    // Para sincronizar y validar los inputs
    protected $rules = ['requirement.name' => ['required']];
    public function mount(Course $course)
    {
        $this->course = $course;
        $this->requirement = new Requirement();
    }
    public function render()
    {
        return view('livewire.frontend.instructor.courses-requirements');
    }
    public function store()
    {
        $this->validate(['name' => ['required']]);
        $this->course->requirements()->create(['name' => $this->name]);
        $this->reset('name');
        $this->course = Course::find($this->course->id);
    }
    public function edit(Requirement $requirement)
    {
        $this->requirement = $requirement;
    }
    public function update()
    {
        $this->validate();
        $this->requirement->save();
        //borramos la información de la propiedad requirem$this->requirement
        $this->requirement = new Requirement();
        //Actualizamos la información del curso
        $this->course = Course::find($this->course->id);
    }
    public function destroy(Requirement $requirement)
    {
        $requirement->delete();
        //Actualizamos la información del curso
        $this->course = Course::find($this->course->id);

    }
}