<?php

namespace Database\Seeders\SchoolManagement;

use App\Models\Extracurricular;
use Illuminate\Database\Seeder;

class ExtracurricularSeeder extends Seeder
{
    public function run(): void
    {
        Extracurricular::factory(10)->create();
    }
}
