<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id)
    {
        $title = 'Sistem Sekolah - Ubah Kelas';

        $majors = [
            ['id' => 1, 'code' => 'AKL', 'name' => 'Akuntansi dan Keuangan Lembaga'],
            ['id' => 2, 'code' => 'TKJ', 'name' => 'Teknik Komputer dan Jaringan'],
            ['id' => 3, 'code' => 'BD', 'name' => 'Bisnis Digital'],
        ];

        $teachers = [
            ['id' => 1, 'name' => 'Budi Santoso'],
            ['id' => 2, 'name' => 'Siti Aminah'],
        ];

        $classes = [
            [
                'id' => 1,
                'name' => 'XII AKL 1',
                'grade' => 'XII',
                'major_id' => 1,
                'major' => 'AKL',
                'teacher_id' => 1,
                'teacher' => 'Budi Santoso',
            ],
            [
                'id' => 2,
                'name' => 'XII TKJ 1',
                'grade' => 'XII',
                'major_id' => 2,
                'major' => 'TKJ',
                'teacher_id' => 2,
                'teacher' => 'Siti Aminah',
            ],
        ];

        $class = collect($classes)->firstWhere('id', (int) $id);

        return view('classes.edit', [
            'title' => $title,
            'class' => $class,
            'majors' => $majors,
            'teachers' => $teachers,
        ]);
    }
}
