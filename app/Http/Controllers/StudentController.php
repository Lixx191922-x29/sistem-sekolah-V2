<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
 
 
class StudentController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Siswa";
        $students = [
            [
                'id' => 1,
                'nis' => "22100001",
                'name' => 'Andi',
                'class' => 'XII TKJ 3',
                'major' => 'TKJ'
            ],
            [
                'id' =>2,
                'nis' => '22100002',
                'name' => 'Budi Asiang',
                'class' => 'XII AKL 3',
                'major' => 'AKL'
            ],
        ];
        return view('students.index', [
        'title' => $title,
        'students' => $students
        ]);
    }
    public function show(string $id)
    {
        $title = "Sistem Sekolah - Menampilkan data Siswa";
        return view('students.show', [
        'title' => $title
        ]);
    }
 
    public function create(){
        $title = "Sistem Sekolah - Membuat Data Siswa";
        return view('students.create', [
        'title' => $title
        ]);
    }
 
    public function edit(string $id){
        $title = "Sistem Sekolah - edit Siswa";
        return view('students.Edit', [
        'title' => $title
        ]);
    }
   
    public function store(){
        return"Melakukan penambahan data student baru";
    }
 
    public function update(string $id){
        return"Mengubah data student dengan ID: {$id}";
    }
 
    public function destroy(string $id){
        return"Menghapus data student dengan ID: {$id}";
    }
}