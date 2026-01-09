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
        /*$schoolYear = SchoolYear::query()
            ->where('is_active', true)
            ->first();
        $institution = Institution::pluck('id');

        $institutionSelected = $institution->random();

        // Kepala sekolah
        User::factory(1)
            ->create()
            ->each(function (User $user) use ($schoolYear, $institutionSelected): void {
                $this->createEmployee([
                    'user_id' => $user->id
                ]);

                $this->createHomebase([
                    'user_id' => $user->id,
                    'institution_id' => $institutionSelected,
                ]);

                $this->createEmployeePosition([
                    'user_id' => $user->id,
                    'school_year_id' => $schoolYear?->id,
                    'institution_id' => $institutionSelected,
                    'personnel_department_id' => 1
                ]);
            });

        // Wakil kepala sekolah
        User::factory(1)
            ->create()
            ->each(function (User $user) use ($schoolYear, $institutionSelected): void {
                $this->createEmployee([
                    'user_id' => $user->id
                ]);

                $this->createHomebase([
                    'user_id' => $user->id,
                    'institution_id' => $institutionSelected,
                ]);

                $this->createEmployeePosition([
                    'user_id' => $user->id,
                    'school_year_id' => $schoolYear?->id,
                    'institution_id' => $institutionSelected,
                    'personnel_department_id' => 2
                ]);
            });

        // Guru dan Staff (tidak termasuk kepala sekolah & wakilnya)
        User::factory(20)
            ->create()
            ->each(function (User $user) use ($schoolYear, $institutionSelected): void {
                $this->createEmployee([
                    'user_id' => $user->id
                ]);

                $this->createHomebase([
                    'user_id' => $user->id,
                    'institution_id' => $institutionSelected,
                ]);

                $this->createEmployeePosition([
                    'user_id' => $user->id,
                    'school_year_id' => $schoolYear?->id,
                    'institution_id' => $institutionSelected,
                    'personnel_department_id' => PersonnelDepartment::whereNotIn('id', [1, 2, 6, 8])
                        ->pluck('id')->random()
                ]);
            });

        // staff khusus
        User::factory(4)
            ->create()
            ->each(function (User $user) use ($schoolYear, $institutionSelected): void {
                $user->assignRole(random_int(2, 3));

                $this->createEmployee([
                    'user_id' => $user->id
                ]);

                $this->createHomebase([
                    'user_id' => $user->id,
                    'institution_id' => $institutionSelected,
                ]);

                $this->createEmployeePosition([
                    'user_id' => $user->id,
                    'school_year_id' => $schoolYear?->id,
                    'institution_id' => $institutionSelected,
                    'personnel_department_id' => PersonnelDepartment::whereIn('id', [6, 8])
                        ->pluck('id')->random()
                ]);
            });*/

        $schoolYear = SchoolYear::where('is_active', true)->first();
        $institutionId = Institution::inRandomOrder()->value('id');

        $generalDepartments = PersonnelDepartment::whereNotIn('id', [1, 2, 6, 8])
            ->pluck('id')
            ->toArray();

        $specialDepartments = [6, 8];

        // Kepala sekolah
        $this->seedUsers(1, $schoolYear, $institutionId, 1);

        // Wakil kepala sekolah
        $this->seedUsers(1, $schoolYear, $institutionId, 2);

        // Guru & staff umum
        $this->seedUsers(20, $schoolYear, $institutionId, fn () =>
        $generalDepartments[array_rand($generalDepartments)]
        );

        // Staff khusus
        $this->seedUsers(
            4,
            $schoolYear,
            $institutionId,
            fn () => $specialDepartments[array_rand($specialDepartments)],
            fn (User $user) => $user->assignRole(random_int(2, 3))
        );
    }

    private function seedUsers(int $count, ?SchoolYear $schoolYear, int $institutionId, int|callable $departmentResolver, ?callable $afterUserCreated = null): void
    {
        User::factory($count)->create()->each(function (User $user) use ($schoolYear, $institutionId, $departmentResolver, $afterUserCreated) {
            if ($afterUserCreated) {
                $afterUserCreated($user);
            }

            $this->createEmployee($user->id);
            $this->createHomebase($user->id, $institutionId);

            $departmentId = is_callable($departmentResolver)
                ? $departmentResolver()
                : $departmentResolver;

            $this->createEmployeePosition(
                $user->id,
                $schoolYear?->id,
                $institutionId,
                $departmentId
            );
        });
    }

    private function createEmployee($userId): void
    {
        $faker = Factory::create();

        // TODO Create Employee
        Employee::create([
            'slug' => Str::uuid()->toString(),
            'user_id' => $userId,
            'nip' => $faker->numerify('################'),
            'nuptk' => $faker->numerify('##########'),
            'place_of_birth' => $faker->city(),
            'date_of_birth' => $faker->dateTimeBetween('-40 years', now()->subYears(20)),
            'religion' => 'Islam'
        ]);
    }

    private function createHomebase(int $userId, int $institutionId): void
    {
        Homebase::create([
            'slug' => Str::uuid(),
            'user_id' => $userId,
            'institution_id' => $institutionId,
            'appointment_date' => Factory::create()->dateTimeBetween('-10 years'),
        ]);
    }

    private function createEmployeePosition(int $userId, ?int $schoolYearId, int $institutionId, int $departmentId): void
    {
        EmployeePosition::create([
            'slug' => Str::uuid(),
            'user_id' => $userId,
            'school_year_id' => $schoolYearId,
            'institution_id' => $institutionId,
            'personnel_department_id' => $departmentId,
            'is_active' => true,
        ]);
    }
}
