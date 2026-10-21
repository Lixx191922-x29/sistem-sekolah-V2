<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTeacherEmail = 'richard@ski.sch.id';
        $userStudentEmail = 'felix.022@ski.sch.id';

        // User Teacher
        User::updateOrCreate(
            ['email' => $userTeacherEmail],
            [
                'name' => 'Richard Marcell',
                'password' => bcrypt('password'),
                'role' => 'teacher',
            ]
        );

        // User Student
        User::updateOrCreate(
            ['email' => $userStudentEmail],
            [
                'name' => 'Felix Yonathan',
                'password' => bcrypt('password'),
                'role' => 'student',
            ]
        );

    }
}
