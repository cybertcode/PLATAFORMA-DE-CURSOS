<?php

namespace App\Http\Livewire\Frontend\Instructor;

use App\Models\admin\Lesson;
use App\Models\admin\Platform;
use App\Models\admin\Section;
use Livewire\Component;

class CoursesLesson extends Component
{
    public $section, $lesson, $platforms, $name, $platform_id = 1, $url;
    protected $rules = [
        'lesson.name' => ['required'],
        'lesson.platform_id' => ['required'],
        'lesson.url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v-) ) ([\w-]{10,12}) $%x'], //no funciona correctamente
        // 'lesson.url' => ['required', 'regex:/^(?:https?:)?(?:\/\/)?(?:youtu\.be\/|(?:www\.|m\.)?youtube\.com\/(?:watch|v|embed)(?:\.php)?(?:\?.*v=|\/))([a-zA-Z0-9\_-]{7,15})(?:[\?&][a-zA-Z0-9\_-]+=[a-zA-Z0-9\_-]+)*(?:[&\/\#].*)?$/'],
    ];
    public function mount(Section $section)
    {
        $this->section = $section;
        $this->platforms = Platform::all();
        $this->lesson = new Lesson();
    }
    public function render()
    {
        return view('livewire.frontend.instructor.courses-lesson');
    }
    // Método para guardar la leccion
    public function store()
    {
        $rules = [
            'name' => ['required'],
            'platform_id' => ['required'],
            'url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v-) ) ([\w-]{10,12}) $%x'], //no funciona correctamente
        ];
        if ($this->platform_id == 2) {
            $rules['url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        }
        $this->validate($rules);
        // Guardamos
        Lesson::create([
            'name' => $this->name,
            'platform_id' => $this->platform_id,
            'url' => $this->url,
            'section_id' => $this->section->id,
        ]);
        // formateamos o limpiamos las propiedades
        $this->reset(['name', 'platform_id', 'url']);
        $this->section = Section::find($this->section->id); //La information de la sección se actualice

    }
    public function edit(Lesson $lesson)
    {
        $this->resetValidation(); //para resetear la validación
        $this->lesson = $lesson;
    }
    public function update()
    {
        // para verificar que la plataforma coincida con el link
        if ($this->lesson->platform_id == 2) {
            $this->rules['lesson.url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
            // $this->rules['lesson.url'] = ['required', 'regex:/(?:https?\:\/\/)?(?:www\.)?(?:vimeo\.com\/)([0-9]+)/'];
        }
        $this->validate();
        $this->lesson->save(); //Guardamos
        $this->lesson = new Lesson(); //Limpiamos la propiedad lesson instanciando una nueva clase
        $this->section = Section::find($this->section->id); //La information de la sección se actualice

        $this->validate();
    }
    public function cancel()
    {
        $this->lesson = new Lesson(); //Limpiamos la propiedad lesson instanciando una nueva clase

    }
    // Eliminamos la sección
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        $this->section = Section::find($this->section->id); //La information de la sección se actualice
    }
}