<?php

namespace App\Http\Livewire\Frontend\Instructor;

use App\Models\admin\Course;
use App\Models\admin\Section;
use Livewire\Component;

class CoursesCurriculum extends Component
{
    public $course;
    public $section;
    public $name; //Para agregar nueva sección
    protected $rules = [
        'section.name' => ['required'],
    ];
    public function mount(Course $course)
    {
        $this->course = $course;
        $this->section = new Section();
    }
    public function render()
    {
        // return view('livewire.frontend.instructor.courses-curriculum');original
        // Por defecto extiende la plantilla resources\views\layouts\app.blade.php nosotros le cambiamos para que extienda la otra plantilla personalizada por nosotros
        return view('livewire.frontend.instructor.courses-curriculum')->layout('layouts.instructor');
    }
    // Para editar el nombre de la sección
    public function edit(Section $section)
    {
        // remplazamos sectión por la consulta
        $this->section = $section;
    }
    // Para guardar la nueva sección
    public function store()
    {
        $this->validate([
            'name' => ['required'],
        ]);
        Section::create([
            'name' => $this->name,
            'course_id' => $this->course->id,
        ]);
        // despues de guardar reteamos el valor de name
        $this->reset('name');
        //Luego refresque la información del curso
        $this->course = Course::find($this->course->id);

    }
    // Actualizar el nombre de la sección
    public function update()
    {
        // Usamos la validación
        $this->validate();
        $this->section->save();
        // Luego reseteamos
        $this->section = new Section();
        // Para que se actualice en vista y nos traiga nuevamente los datos del que estamos editando es decir nos refresque
        $this->course = Course::find($this->course->id);
    }
    // Eliminamos la sección
    public function destroy(Section $section)
    {
        $section->delete();
        $this->course = Course::find($this->course->id);
    }
}