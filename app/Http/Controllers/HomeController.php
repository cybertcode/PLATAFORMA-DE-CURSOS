<?php

namespace App\Http\Controllers;

use App\Models\admin\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        // return Course::find(9)->rating;
        $courses = Course::where('status', '3')->latest('id')->get()->take(12);
        return view('welcome', compact('courses'));
    }
}
