<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CourseController;

Route::redirect('', 'courses'); //para redirigir si alguien accede a ruta instructor
// Route::get('courses', InstructorCourses::class)->middleware('can:Ver cursos')->name('courses.index'); anterior
Route::resource('courses', CourseController::class)->names('courses');