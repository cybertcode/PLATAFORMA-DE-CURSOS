<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Frontend\Instructor\InstructorCourses;

Route::redirect('', 'courses'); //para redirigir si alguien accede a ruta instructor
Route::get('courses', InstructorCourses::class)->middleware('can:Ver cursos')->name('courses.index');