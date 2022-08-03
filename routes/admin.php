<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return "success";
// });

Route::get('/inicio', [AdminController::class, 'index'])->middleware('can:Ver dashboard')->name('home');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('usuarios', UserController::class)->only(['index', 'edit', 'update', 'destroy'])->names('users'); //Incorrecto
// Route::resource('users', UserController::class)->names('users');//correcto
Route::get('courses', [CourseController::class, 'index'])->name('courses.index');