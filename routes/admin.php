<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\AdminController;

// Route::get('/', function () {
//     return "success";
// });

Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::resource('roles', RoleController::class)->names('roles');