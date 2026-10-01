<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Siswa';

        $students = Student::select(['id', 'nis', 'name', 'class', 'major'])->get();

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

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari form
        $validatedRequest = $request->validate([
            'nis' => ['required', 'digits:4', 'unique:students,nis'],
            'name' => ['required', 'string'],
            'gender' => ['required', 'in:L,P'],
            'major' => ['required', 'string', 'in:TKJ,AKL,BID'],
            'class' => ['required', 'string'],

        ]);

        // Tambahkan Data Ke Database
        Student::create($validatedRequest);

        // Handle if succes
        return redirect()->route('students.index');
    }



    public function update(Student $student, Request $request)
    {
        $validatedRequest = $request->validate([
            'nis' => ['required', 'digits:4', 'unique:students,nis,' . $student->id],
            'name' => ['required', 'string'],
            'gender' => ['required', 'in:L,P'],
            'major' => ['required', 'string', 'in:TKJ,AKL,BID'],
            'class' => ['required', 'string'],
        ]);

        //Update Data
        $student->update($validatedRequest);

        //Handle if success
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
