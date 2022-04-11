<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Students routes
Route::resource('students', App\Http\Controllers\StudentController::class);

//Group routes
Route::post('/assignStudents/{id}', [App\Http\Controllers\GroupController::class, 'assignStudents'])->name('assignStudents');
Route::get('/unassignStudents/{student_id}', [App\Http\Controllers\GroupController::class, 'unassignStudents'])->name('unassignStudents');

//Main project routes
Route::get('/', [App\Http\Controllers\ProjectController::class, 'index'])->name('index');
Route::post('/project/set', [App\Http\Controllers\ProjectController::class, 'set'])->name('projectSet');





