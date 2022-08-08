<?php

namespace App\Http\Livewire\Frontend\Instructor;

use App\Models\admin\Audience;
use App\Models\admin\Course;
use Livewire\Component;

class CoursesAudiences extends Component
{
    public $course, $audience, $name;
    // Para sincronizar y validar los inputs
    protected $rules = ['audience.name' => ['required']];
    public function mount(Course $course)
    {
        $this->course = $course;
        $this->audience = new Audience();
    }
    public function render()
    {
        return view('livewire.frontend.instructor.courses-audiences');
    }
    public function store()
    {
        $this->validate(['name' => ['required']]);
        $this->course->audiences()->create(['name' => $this->name]);
        $this->reset('name');
        $this->course = Course::find($this->course->id);
    }
    public function edit(Audience $audience)
    {
        $this->audience = $audience;
    }
    public function update()
    {
        $this->validate();
        $this->audience->save();
        //borramos la información de la propiedad requirem$this->audience
        $this->audience = new Audience();
        //Actualizamos la información del curso
        $this->course = Course::find($this->course->id);
    }
    public function destroy(Audience $audience)
    {
        $audience->delete();
        //Actualizamos la información del curso
        $this->course = Course::find($this->course->id);

    }
}