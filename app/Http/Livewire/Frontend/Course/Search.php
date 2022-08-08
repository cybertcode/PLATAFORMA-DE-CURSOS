<?php

namespace App\Http\Livewire\Frontend\Course;

use Livewire\Component;
use App\Models\admin\Course;

class Search extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.frontend.course.search');
    }
    // Creamos una propiedad computada
    public function getResultsProperty()
    {
        return Course::where('title', 'LIKE', '%' . $this->search . '%')
            ->where('status', 3)
            ->take(8)
            ->get();
    }
}