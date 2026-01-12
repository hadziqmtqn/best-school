<?php

namespace Database\Seeders\SchoolManagement;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    public function run(): void
    {
        Achievement::factory(10)
            ->create();
    }
}
