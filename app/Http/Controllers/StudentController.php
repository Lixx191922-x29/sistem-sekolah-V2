<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Siswa';

        $students = Student::select(['id', 'nis', 'name', 'class', 'major'])
        ->paginate(10);

        return view('students.index', [
            'title' => $title,
            'students' => $students,
        ]);
    }

    public function show(Student $student)
    {
        $title = 'Sistem Sekolah - Detail Siswa';

        return view('students.show', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Siswa';

        return view('students.create', [
            'title' => $title,
        ]);
    }

    public function edit(Student $student)
    {
        return view('students.edit', [
            'title' => 'Sistem Sekolah - Ubah Siswa',
            'student' => $student,
        ]);
    }

    public function store(StoreRequest $request)
    {
        // Validasi data yang dikirimkan dari form
        $validatedRequest = $request->validated();

        // Tambahkan Data Ke Database
        Student::create($validatedRequest);

        // Handle if succes
        return redirect()->route('students.index');
    }

    public function update(Student $student, UpdateRequest $request)
    {
        $validatedRequest = $request->validated();

        // Update Data
        $student->update($validatedRequest);

        // Handle if success
        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        // Delete Data
        $student->delete();

        // Handle if success
        return redirect()->route('students.index');
    }
}
