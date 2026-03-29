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
use Random\RandomException;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws RandomException
     */
    public function run(): void
    {
        $schoolYear = SchoolYear::where('is_active', true)->first();
        $institutions = Institution::all();

        $generalDepartments = PersonnelDepartment::whereNotIn('id', [1, 2, 6, 8])
            ->pluck('id')
            ->toArray();

        $specialDepartments = [6, 8];

        foreach ($institutions as $institution) {
            $institutionId = $institution->id;

            // Kepala sekolah
            $this->seedUsers(count: 1, schoolYear: $schoolYear, institutionId: (int) $institutionId, departmentResolver: 1);

            // Wakil kepala sekolah
            $this->seedUsers(count: 1, schoolYear: $schoolYear, institutionId: (int) $institutionId, departmentResolver: 2);

            // Guru & staff umum
            $this->seedUsers(count: 20, schoolYear: $schoolYear, institutionId: (int) $institutionId, departmentResolver: fn () =>
                $generalDepartments[array_rand($generalDepartments)]
            );

            // Staff khusus
            $this->seedUsers(
                count: 4,
                schoolYear: $schoolYear,
                institutionId: (int) $institutionId,
                departmentResolver: fn () => $specialDepartments[array_rand($specialDepartments)],
                afterUserCreated: fn (User $user) => $user->assignRole(random_int(2, 3))
            );
        }
    }

    private function seedUsers(int $count, ?SchoolYear $schoolYear, int $institutionId, int|callable $departmentResolver, ?callable $afterUserCreated = null): void
    {
        $faker = Factory::create('id_ID');

        for ($i = 0; $i < $count; $i++) {
            // 1. Acak gender dan nama di awal agar sinkron
            $gender = $faker->randomElement(['male', 'female']);
            $name = $faker->name($gender);
            $username = Str::slug($name);

            // 2. Buat User dengan nama yang sudah sesuai gender
            $user = User::factory()->create([
                'name' => $name,
                'username' => $username,
                'email' => $username . '@bkn.my.id',
            ]);

            if ($afterUserCreated) {
                $afterUserCreated($user);
            }

            // 3. Buat Employee dan teruskan gendernya ke sini
            $this->createEmployee($user->id, $gender);
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
        }
    }

    private function createEmployee($userId, string $gender): void
    {
        $faker = Factory::create('id_ID');

        // TODO Create Employee
        Employee::create([
            'slug' => Str::uuid()->toString(),
            'user_id' => $userId,
            'nip' => $faker->numerify('################'),
            'nuptk' => $faker->numerify('##########'),
            'place_of_birth' => $faker->city(),
            'date_of_birth' => $faker->dateTimeBetween('-40 years', now()->subYears(20)),
            'religion' => 'Islam',
            'gender' => $gender // Gender sekarang tersimpan untuk semua employee
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
