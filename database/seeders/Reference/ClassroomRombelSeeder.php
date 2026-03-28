<?php

namespace Database\Seeders\Reference;

use App\Models\Classroom;
use App\Models\Rombel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClassroomRombelSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['VII', 'VIII', 'IX', 'X', 'XI', 'XII'] as $item) {
            Classroom::create([
                'slug' => Str::uuid()->toString(),
                'name' => $item
            ]);
        }

        foreach (['A', 'B', 'C'] as $item) {
            Rombel::create([
                'slug' => Str::uuid()->toString(),
                'name' => $item
            ]);
        }
    }
}
