<?php

use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Frontend\Instructor\CoursesCurriculum;
use App\Http\Livewire\Frontend\Instructor\CoursesStudents;
use Illuminate\Support\Facades\Route;

Route::redirect('', 'courses'); //para redirigir si alguien accede a ruta instructor
// Route::get('courses', InstructorCourses::class)->middleware('can:Ver cursos')->name('courses.index'); anterior
Route::resource('courses', CourseController::class)->names('courses');
Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->name('courses.curriculum');
Route::get('courses/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');
// Asigmos el control de ruta al componente de livewire
Route::get('courses/{course}/students', CoursesStudents::class)->name('courses.students');