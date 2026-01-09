<?php

namespace Database\Seeders\SchoolManagement;

use App\Models\Employee;
use App\Models\EmployeePosition;
use App\Models\Homebase;
use App\Models\Institution;
use App\Models\PersonnelDepartment;
use App\Models\SchoolYear;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(20)
            ->create()
            ->each(function (User $user): void {
                $this->createEmployee($user);
            });
    }

    private function createEmployee(User $user): void
    {
        $faker = Factory::create();
        $schoolYear = SchoolYear::query()
            ->where('is_active', true)
            ->first();
        $institution = Institution::pluck('id');
        $personnelDepartment = PersonnelDepartment::pluck('id');

        $institutionSelected = $institution->random();
        $personnelDepartmentSelected = $personnelDepartment->random();

        // TODO Create Employee
        Employee::create([
            'slug' => Str::uuid()->toString(),
            'user_id' => $user->id,
            'nip' => $faker->numerify('################'),
            'nuptk' => $faker->numerify('##########'),
            'place_of_birth' => $faker->city(),
            'date_of_birth' => $faker->dateTimeBetween('-40 years', now()->subYears(20)),
            'religion' => $faker->randomElements(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Khonghuchu'])
        ]);

        // TODO Create Homebase
        Homebase::create([
            'user_id' => $user->id,
            'institution_id' => $institutionSelected,
            'appointment_date' => $faker->dateTimeBetween(['-10 Years', 'now'])
        ]);

        // TODO Employee Position
        if (EmployeePosition::where([
            'school_year_id' => $schoolYear?->id,
            'institution_id' => $institutionSelected,
            'personnel_department_id' => 1
            ])->exists()) {
            return;
        }

        EmployeePosition::create([
            'school_year_id' => $schoolYear?->id,
            'institution_id' => $institutionSelected,
            'personnel_department_id' => $personnelDepartmentSelected
        ]);
    }
}
