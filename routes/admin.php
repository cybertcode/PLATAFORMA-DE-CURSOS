<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\LevelController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\CategoryController;

// Route::get('/', function () {
//     return "success";
// });

Route::get('/inicio', [AdminController::class, 'index'])->middleware('can:Ver dashboard')->name('home');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('usuarios', UserController::class)->only(['index', 'edit', 'update', 'destroy'])->names('users'); //Incorrecto
// Route::resource('users', UserController::class)->names('users');//correcto
Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');
// Para aprobar el curso
Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');
// Para observar el curso
Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');
Route::post('courses/{course}/reject', [CourseController::class, 'reject'])->name('courses.reject');
// Ruta para categorías
Route::resource('categories', CategoryController::class)->names('categories');
// Ruta para nivels
Route::resource('levels', LevelController::class)->names('levels');