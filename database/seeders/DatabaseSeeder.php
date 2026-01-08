<?php

namespace Database\Seeders;

use Database\Seeders\Auth\PermissionSeeder;
use Database\Seeders\Auth\SuperAdminSeeder;
use Database\Seeders\Reference\EducationalLevelSeeder;
use Database\Seeders\Reference\PersonnelDepartmentSeeder;
use Database\Seeders\Reference\SchoolYearSeeder;
use Database\Seeders\SchoolManagement\InstitutionSeeder;
use Database\Seeders\SchoolManagement\SchoolStatsOverviewSeeder;
use Database\Seeders\Setting\ApplicationSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // AUTH
            PermissionSeeder::class,
            SuperAdminSeeder::class,
            // SETTING
            ApplicationSeeder::class,
            // REFERENCE
            PersonnelDepartmentSeeder::class,
            EducationalLevelSeeder::class,
            SchoolYearSeeder::class,
            // SCHOOL MANAGEMENT
            InstitutionSeeder::class,
            SchoolStatsOverviewSeeder::class
        ]);
    }
}
