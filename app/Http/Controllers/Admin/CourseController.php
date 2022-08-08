<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\ApprovedCourse;
use App\Mail\RejectCourse;
use App\Models\admin\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 2)->paginate(8);
        return view('admin.pages.course.index', compact('courses'));
    }
    public function show(Course $course)
    {
        $this->authorize('revision', $course); //Para denegar que un curso en estado 1 o en estado borrador sea aprobado
        return view('admin.pages.course.show', compact('course'));
    }
    public function approved(Course $course)
    {
        $this->authorize('revision', $course); //Para denegar que un curso en estado 1 o en estado borrador sea aprobado

        if (!$course->lessons || !$course->goals || !$course->requirements || !$course->image) {
            return back()->with('info', 'El curso no puede ser aprobado por estar incompleto');
        }
        $course->status = 3;
        $course->save();
        //enviamos el correo electrónico
        // dd($course->teacher->email);
        $mail = new ApprovedCourse($course);
        // Mail::to($course->teacher->email)->send($mail); //lo normal
        Mail::to($course->teacher->email)->queue($mail); //con queue

        return redirect()->route('admin.courses.index')->with('success', 'El curso se publicó correctamente');
    }
    // Para observaciones del curso
    public function observation(Course $course)
    {
        return view('admin.pages.course.observation', compact('course'));
    }
    public function reject(Request $request, Course $course)
    {
        $request->validate([
            'body' => ['required'],
        ]);
        $course->observation()->create($request->all());
        $course->status = 1;
        $course->save();

        $mail = new RejectCourse($course);
        Mail::to($course->teacher->email)->queue($mail); //con queue
        return redirect()->route('admin.courses.index')->with('success', 'El curso se ha rechazado correctamente');

    }
}