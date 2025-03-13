<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('students.index');
// });

// student index page
Route::get('/', [StudentController::class, 'index'])->name('students.index');
// student create page
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
// student store 
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
// student update page
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');