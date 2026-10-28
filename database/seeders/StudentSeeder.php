<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use RuntimeException;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $existingNis = Student::query()
            ->pluck('nis')
            ->map(fn (string $nis): int => (int) $nis)
            ->all();
        $availableNis = array_values(array_diff(range(0, 9999), $existingNis));

        if (count($availableNis) < 100) {
            throw new RuntimeException('There are not enough available four-digit NIS values to seed 100 students.');
        }

        shuffle($availableNis);
        $nisValues = array_slice($availableNis, 0, 100);

        Student::factory()
            ->count(100)
            ->sequence(fn (Sequence $sequence): array => [
                'nis' => str_pad((string) $nisValues[$sequence->index], 4, '0', STR_PAD_LEFT),
            ])
            ->create();
    }
}
