<?php

use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Student\Controller;
use App\Http\Controllers\MajorClass\CreateController;
use App\Http\Controllers\MajorClass\destroyController;
use App\Http\Controllers\MajorClass\editController;
use App\Http\Controllers\MajorClass\indexController;
use App\Http\Controllers\MajorClass\showController;
use App\Http\Controllers\MajorClass\storeController;
use App\Http\Controllers\MajorClass\updateController;
use App\Http\Controllers\MajorController; 

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Manajemen Data Siswa (Action)
Route::name('student.')->prefix('students')->group(function (){
    //Halaman Daftar Siswa
    Route::get('/', [StudentController::class, 'index'])->name('index');

    //Detail Siswa
    Route::get('/{$id}', function(string $id){
        return "Menampilkan siswa dengan ID: {$id}";
    })->name('show');

    //Tambah Siswa
    Route::get('/create', function(){
        return "Menampilkan halaman tambah siswa";
    })->name('create');

    //
})


