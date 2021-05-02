<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomerController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Livewire\CourseStatus;

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

Route::get('/',HomerController::class)->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('cursos', [CourseController::class, 'index'])->name('courses.index');

Route::get('cursos/{course}', [CourseController::class, 'show'])->name('courses.show');

//Matricular al usuario
Route::post('courses/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enrolled');

//Redirigir a avance del curso
Route::get('course-status/{course}', CourseStatus::class)->name('courses.status')->middleware('auth');  