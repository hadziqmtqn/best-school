<?php

namespace Database\Seeders;

use Database\Seeders\Auth\PermissionSeeder;
use Database\Seeders\Auth\SuperAdminSeeder;
use Database\Seeders\Events\AgendaSeeder;
use Database\Seeders\Events\AnnouncementSeeder;
use Database\Seeders\Posts\PostCategorySeeder;
use Database\Seeders\Posts\PostSeeder;
use Database\Seeders\Reference\ClassroomRombelSeeder;
use Database\Seeders\Reference\EducationalLevelSeeder;
use Database\Seeders\Reference\PersonnelDepartmentSeeder;
use Database\Seeders\Reference\SchoolYearSeeder;
use Database\Seeders\SchoolManagement\AchievementSeeder;
use Database\Seeders\SchoolManagement\EmployeeSeeder;
use Database\Seeders\SchoolManagement\ExtracurricularSeeder;
use Database\Seeders\SchoolManagement\FacilitySeeder;
use Database\Seeders\SchoolManagement\InstitutionSeeder;
use Database\Seeders\SchoolManagement\NumberOfStudentSeeder;
use Database\Seeders\SchoolManagement\PageSeeder;
use Database\Seeders\Setting\ApplicationSeeder;
use Database\Seeders\Setting\NavigationSeeder;
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
            ClassroomRombelSeeder::class,
            // SCHOOL MANAGEMENT
            InstitutionSeeder::class,

            // DUMMY DATA
            EmployeeSeeder::class,
            NumberOfStudentSeeder::class,
            AgendaSeeder::class,
            AnnouncementSeeder::class,
            PostCategorySeeder::class,
            PostSeeder::class,
            FacilitySeeder::class,
            ExtracurricularSeeder::class,
            AchievementSeeder::class,
            PageSeeder::class,
            NavigationSeeder::class
        ]);
    }
}
