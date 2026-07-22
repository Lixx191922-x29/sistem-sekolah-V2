<?php

use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Student\Controller;
use App\Http\Controllers\MajorClass\CreateController;
use App\Http\Controllers\MajorClass\DestroyController;
use App\Http\Controllers\MajorClass\EditController;
use App\Http\Controllers\MajorClass\IndexController;
use App\Http\Controllers\MajorClass\ShowController;
use App\Http\Controllers\MajorClass\StoreController;
use App\Http\Controllers\MajorClass\UpdateController;
use App\Http\Controllers\MajorController; 

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Manajemen Guru
Route::name('teachers.')->prefix('teachers')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('index');
    
    Route::get('/{id}', [TeacherController::class, 'show'])->name('show');

    Route::get('/create', [TeacherController::class, 'create'])->name('create');

    Route::post('/', [TeacherController::class, 'store'])->name('store');

    Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('edit');

    Route::put('/{id}', [TeacherController::class, 'update'])->name('update');

    Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('destroy');
});

// Manajemen Siswa
Route::name('students.')->prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');

    Route::get('/{id}', [StudentController::class, 'show'])->name('show');

    Route::get('/create', [StudentController::class, 'create'])->name('create');

    Route::post('/', [StudentController::class, 'store'])->name('store');

    Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');

    Route::put('/{id}', [StudentController::class, 'update'])->name('update');

    Route::delete('/{id}', [StudentController::class, 'destroy'])->name('destroy');
});

// Manajemen Kelas (Invokable)
Route::name('classes.')->prefix('classes')->group(function () {
    Route::get('/', IndexController::class)->name('index');

    Route::get('/{id}', ShowController::class)->name('show');

    Route::get('/create', CreateController::class)->name('create');

    Route::post('/', StoreController::class)->name('store');

    Route::get('/{id}/edit', EditController::class)->name('edit');

    Route::put('/{id}', UpdateController::class)->name('update');

    Route::delete('/{id}', DestroyController::class)->name('destroy');
});

// Manajemen Jurusan
Route::resource('majors', MajorController::class);


