<?php

namespace Database\Seeders\SchoolManagement;

use App\Models\Classroom;
use App\Models\EmployeePosition;
use App\Models\NumberOfStudent;
use App\Models\Rombel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Random\RandomException;

class NumberOfStudentSeeder extends Seeder
{
    /**
     * @throws RandomException
     */
    public function run(): void
    {
        $classrooms = Classroom::pluck('id');

        $employeePositions = EmployeePosition::where('personnel_department_id', 3) // wali kelas
            ->get();

        $rombel = Rombel::pluck('id');

        foreach ($employeePositions as $employeePosition) {
            NumberOfStudent::create([
                'slug' => Str::uuid()->toString(),
                'employee_position_id' => $employeePosition->id,
                'classroom_id' => $classrooms->random(),
                'rombel_id' => $rombel->random(),
                'amount' => random_int(25, 35)
            ]);
        }
    }
}
