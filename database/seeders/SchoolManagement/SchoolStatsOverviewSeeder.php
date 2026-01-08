<?php

namespace Database\Seeders\SchoolManagement;

use App\Models\Homebase;
use App\Models\Institution;
use App\Models\SchoolStatsOverview;
use App\Models\SchoolYear;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Random\RandomException;

class SchoolStatsOverviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws RandomException
     */
    public function run(): void
    {
        foreach (Institution::all() as $institution) {
            $schoolStatsOverview = new SchoolStatsOverview();
            $schoolStatsOverview->slug = Str::uuid()->toString();
            $schoolStatsOverview->institution_id = $institution->id;
            $schoolStatsOverview->school_year_id = SchoolYear::where('is_active', true)->first()?->id;
            $schoolStatsOverview->number_of_teachers = Homebase::where('institution_id', $institution->id)->count();
            $schoolStatsOverview->number_of_students = random_int(120, 300);
            $schoolStatsOverview->number_of_classrooms = random_int(12, 30);
            $schoolStatsOverview->save();
        }
    }
}
