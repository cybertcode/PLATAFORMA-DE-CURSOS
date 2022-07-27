<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AdminController;

// Route::get('/', function () {
//     return "success";
// });

Route::get('/inicio', [AdminController::class, 'index'])->name('home');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('usuarios', UserController::class)->only(['index', 'edit', 'update', 'destroy'])->names('users');//Incorrecto
// Route::resource('users', UserController::class)->names('users');//correcto