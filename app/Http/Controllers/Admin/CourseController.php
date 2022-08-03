<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 2)->paginate(8);
        return view('admin.pages.course.index', compact('courses'));
    }
}