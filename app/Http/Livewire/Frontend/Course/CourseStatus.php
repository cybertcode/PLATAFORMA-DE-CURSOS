<?php

namespace App\Http\Livewire\Frontend\Course;

use Livewire\Component;
use App\Models\admin\Course;
use App\Models\admin\Lesson;

class CourseStatus extends Component
{
    public $course, $current;
    public function mount(Course $course)
    {
        $this->course = $course;
        foreach ($course->lessons as  $lesson) {
            if (!$lesson->completed) {
                $this->current = $lesson;
                // // Indice
                // $this->index = $course->lessons->search($lesson);
                // // previous
                // $this->previous = $course->lessons[$this->index - 1];
                // // next
                // $this->next = $course->lessons[$this->index + 1];
                break;
            }
        }
        // Para asignar a current la última lección al llegar al final
        if (!$this->current) {
            $this->current = $course->lessons->last();
        }
    }
    public function render()
    {
        return view('livewire.frontend.course.course-status');
    }
    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;
        // $this->index = $this->course->lessons->pluck('id')->search($lesson->id);
        // if ($this->index == 0) {
        //     $this->previous = null;
        // } else {
        //     $this->previous = $this->course->lessons[$this->index - 1];
        // }
        // if ($this->index == $this->course->lessons->count() - 1) {
        //     $this->next = null;
        // } else {
        //     $this->next = $this->course->lessons[$this->index + 1];
        // }
    }
    // Para agregar o quitar el curso culminado
    public function completed()
    {
        if ($this->current->completed) {
            //Eliminamos el registros
            $this->current->users()->detach(auth()->user()->id);
        } else {
            //agregamos registro
            $this->current->users()->attach(auth()->user()->id);
        }
        $this->current = Lesson::find($this->current->id); //para marcar el check del curso completado
        $this->course = Course::find($this->course->id); //para marcar el curso completado
    }
    // propiedades computadas
    public function getIndexProperty()
    {
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }
    public function getPreviousProperty()
    {
        if ($this->index == 0) {
            return  null;
        } else {
            return $this->course->lessons[$this->index - 1];
        }
    }
    public function getNextProperty()
    {
        if ($this->index == $this->course->lessons->count() - 1) {
            return null;
        } else {
            return $this->course->lessons[$this->index + 1];
        }
    }
    public function getAdvanceProperty()
    {
        $i = 0;
        foreach ($this->course->lessons as $lesson) {
            // es el atributo completed de abajo
            if ($lesson->completed) {
                $i++;
            }
        }
        $advance = ($i * 100) / ($this->course->lessons->count());
        return round($advance, 2);
    }
}