<?php

namespace App\Http\Livewire\Frontend\Instructor;

use App\Models\admin\Description;
use App\Models\admin\Lesson;
use Livewire\Component;

class LessonDescription extends Component
{
    public $lesson, $description, $name;
    // Para sincronizar el campo en la vista
    protected $rules = ['description.name' => ['required']];
    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;
        if ($lesson->description) {
            $this->description = $lesson->description;
        }
    }
    public function render()
    {
        return view('livewire.frontend.instructor.lesson-description');
    }
    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $this->description = $this->lesson->description()->create(['name' => $this->name]);
        $this->reset('name');
        //actualizamos la información de la leccion
        $this->lesson = Lesson::find($this->lesson->id);

    }
    public function update()
    {
        $this->validate();
        $this->description->save();
    }

    // Eliminamos la sección
    public function destroy()
    {
        $this->description->delete();
        $this->reset('description'); //reseteamos la propiedad
        //actualizamos la información de la leccion
        $this->lesson = Lesson::find($this->lesson->id);
    }
}