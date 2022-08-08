<?php

namespace App\Http\Livewire\Frontend\Course;

use App\Models\admin\Course;
use Livewire\Component;

class CourseReviews extends Component
{
    public $course_id, $rating = 5; //$rating=5 según el profe
    public $comment;
    public function mount(Course $course)
    {
        $this->course_id = $course->id;
    }
    public function render()
    {
        $course = Course::find($this->course_id);
        return view('livewire.frontend.course.course-reviews', compact('course'));
    }
    public function store()
    {
        $this->validate(['comment' => 'required|min:3']);
        $course = Course::find($this->course_id);
        $course->reviews()->create([
            'comment' => $this->comment,
            'rating' => $this->rating,
            'user_id' => auth()->user()->id,
        ]);
    }
}