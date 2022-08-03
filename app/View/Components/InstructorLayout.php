<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InstructorLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    // Cambiamos para trabajar con edit courses
    public $course;

    public function __construct($course)
    {
        $this->course = $course;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // return view('components.instructor-layout');original
        return view('layouts.instructor');
    }
}