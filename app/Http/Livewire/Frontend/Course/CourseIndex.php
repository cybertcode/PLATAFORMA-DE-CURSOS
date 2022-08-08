<?php

namespace App\Http\Livewire\Frontend\Course;

use Livewire\Component;
use App\Models\admin\Level;
use App\Models\admin\Course;
use App\Models\admin\Category;
use Livewire\WithPagination;

class CourseIndex extends Component
{
    use WithPagination; //Para paginar la página sin recargar la web
    public $category_id;
    public $level_id;
    public function render()
    {
        $categories = Category::all();
        $levels     = Level::all();
        $courses = Course::where('status', 3)
            ->latest('id')
            ->category($this->category_id)
            ->level($this->level_id)
            ->paginate(8);
        return view('livewire.frontend.course.course-index', compact('courses', 'levels', 'categories'));
    }
    // Método de resetero filtros
    public function resetFilters()
    {
        $this->reset(['category_id', 'level_id']);
    }
}