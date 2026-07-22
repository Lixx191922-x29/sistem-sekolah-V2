<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Manajemen Siswa
route::name('students.')->prefix('students')->group(function() {
        Route::get('/', [StudentsController::class, 'index'])->name('index');

Route::get('/{id}', function($id){
    return "Menampilkan detail siswa dengan ID = {$id}";
})->name('show');

});

