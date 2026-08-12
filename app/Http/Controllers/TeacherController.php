<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Guru';

        $teachers = [
        [
            'id' => 1,
            'nip' => '198501012024',
            'name' => 'Budi Santoso',
            'gender' => 'Laki-Laki',
            'subject' => 'Akuntansi Dasar',
            'phone' => '081234560001',
            'status' => 'Aktif',
        ],
        [
            'id' => 2,
            'nip' => '198703152024',
            'name' => 'Siti Aminah',
            'gender' => 'Perempuan',
            'subject' => 'Jaringan Komputer',
            'phone' => '081234560002',
            'status' => 'Aktif',
        ]
];


        return view('teachers.index', [
            'title' => $title,
            'teachers' => $teachers,
        ]);
    }

    public function show($id)
    {
        $title = 'Sistem Sekolah - Detail Guru';

        $teachers = [
            [
                'id' => 1,
                'nip' => '198501012024',
                'name' => 'Budi Santoso',
                'gender' => 'Laki-laki',
                'subject' => 'Akuntansi Dasar',
                'phone_number' => '081234560001',
                'status' => 'Aktif',
            ],
            [
                'id' => 2,
                'nip' => '198703152024',
                'name' => 'Siti Aminah',
                'gender' => 'Perempuan',
                'subject' => 'Jaringan Komputer',
                'phone_number' => '081234560002',
                'status' => 'Aktif',
            ],
            [
                'id' => 3,
                'nip' => '199001202024',
                'name' => 'Anton Wijaya',
                'gender' => 'Laki-laki',
                'subject' => 'Sejarah',
                'phone_number' => '081234560003',
                'status' => 'Tidak Aktif',
            ],
        ];

        $teacher = collect($teachers)->firstWhere('id', (int) $id);

        return view('teachers.show', [
            'title' => $title,
            'teacher' => $teacher,
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Guru';

        return view('teachers.create', [
            'title' => $title,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string',
            'name' => 'required|string',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'subject' => 'required|string',
            'phone_number' => 'nullable|string',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);

        // Currently this app uses in-memory arrays for demo data.
        // Persisting to a database requires a Teacher model and migration.
        // For now, redirect back to the index with a success message.

        return redirect()->route('teachers.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $title = 'Sistem Sekolah - Ubah Guru';

        $teachers = [
            [
                'id' => 1,
                'nip' => '198501012024',
                'name' => 'Budi Santoso',
                'gender' => 'Laki-laki',
                'subject' => 'Akuntansi Dasar',
                'phone_number' => '081234560001',
                'status' => 'Aktif',
            ],
            [
                'id' => 2,
                'nip' => '198703152024',
                'name' => 'Siti Aminah',
                'gender' => 'Perempuan',
                'subject' => 'Jaringan Komputer',
                'phone_number' => '081234560002',
                'status' => 'Aktif',
            ],
            [
                'id' => 3,
                'nip' => '199001202024',
                'name' => 'Anton Wijaya',
                'gender' => 'Laki-laki',
                'subject' => 'Sejarah',
                'phone_number' => '081234560003',
                'status' => 'Tidak Aktif',
            ],
        ];

        $teacher = collect($teachers)->firstWhere('id', (int) $id);

        return view('teachers.edit', [
            'title' => $title,
            'teacher' => $teacher,
        ]);
    }

    public function update(Request $request, $id)
    {
        return "Melakukan perubahan data guru";
    }

    public function destroy($id)
    {
        return "Menghapus data guru";
    }
}