<?php

namespace Database\Seeders\SchoolManagement;

use App\Models\Facility;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    public function run(): void
    {
        Facility::factory(10)
            ->create();
    }
}
