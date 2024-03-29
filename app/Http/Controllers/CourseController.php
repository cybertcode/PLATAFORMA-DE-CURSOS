<?php

namespace App\Http\Controllers;

use App\Models\admin\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('frontend.pages.course.index');
    }
    public function show(Course $course)
    {
        $this->authorize('published', $course);
        $similares = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->where('status', 3)
            ->latest('id')
            ->take(5)
            ->get();
        return view('frontend.pages.course.show', compact('course', 'similares'));
    }
    public function enrolled(Course $course)
    {
        // $this->authorize('enrolled', $course);
        $course->students()->attach(auth()->user()->id);
        return redirect()->route('courses.status', $course);
    }
}