<?php

namespace Database\Seeders\Reference;

use App\Models\SchoolYear;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SchoolYearSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([2025, 2026, 2027, 2028, 2029] as $key => $item) {
            SchoolYear::create([
                'slug' => Str::uuid()->toString(),
                'first_year' => $item,
                'last_year' => $item + 1,
                'is_active' => $key === 0
            ]);
        }
    }
}
