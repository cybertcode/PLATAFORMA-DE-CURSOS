<?php

namespace App\Http\Controllers\Instructor;

use App\Models\admin\Level;
use App\Models\admin\Price;
use Illuminate\Support\Str;
use App\Models\admin\Course;
use Illuminate\Http\Request;
use App\Models\admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.instructor.course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
        return view('frontend.pages.instructor.course.create', compact('categories', 'levels', 'prices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return ($request->all());
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug',
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => ['nullable', 'image'],
        ]);
        $course = Course::create($request->all());
        if ($request->file) {
            $url = Storage::put('courses', $request->file);
            $course->image()->create(['url' => $url]);
        }
        return redirect()->route('instructor.courses.edit', $course);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('frontend.pages.instructor.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
        return view('frontend.pages.instructor.course.edit', compact('course', 'categories', 'levels', 'prices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,' . $course->id,
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => ['nullable', 'image'],
        ]);
        $course->update($request->all());
        if ($request->file) {
            //Guardamos en servidor y almacenar la ruta en $url
            $url = Storage::put('courses', $request->file('file'));
            if ($course->image) {
                //elimnamos la imagen
                Storage::delete($course->image->url);
                //Actualizamos cn la nueva ruta
                $course->image->update(['url' => $url]);
            } else {
                $course->image()->create(['url' => $url]);
            }
        }
        return redirect()->route('instructor.courses.edit', $course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}