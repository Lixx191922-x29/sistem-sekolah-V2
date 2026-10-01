<?php

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('stores a student with a four digit NIS', function () {
    $response = $this->post(route('students.store'), [
        'nis' => '0001',
        'name' => 'Siswa Baru',
        'gender' => 'L',
        'major' => 'TKJ',
        'class' => 'X TKJ 1',
    ]);

    $response->assertRedirectToRoute('students.index');
    expect(Student::query()->where('nis', '0001')->exists())->toBeTrue();
});
test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
