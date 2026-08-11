<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id)
    {
        $title = 'Sistem Sekolah - Detail Kelas';

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

        return view('classes.show', [
            'title' => $title,
            'class' => $class,
        ]);
    }
}
