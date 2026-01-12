<?php

namespace Database\Seeders\Setting;

use App\Enums\NavigationCategory;
use App\Models\Navigation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NavigationSeeder extends Seeder
{
    public function run(): void
    {
        $this->create(2, NavigationCategory::SCHOOL_IDENTITY->value);
        $this->create(3, NavigationCategory::PROGRAM->value);
        $this->create(4, NavigationCategory::GALLERY->value);
        $this->create(5, NavigationCategory::EVENT->value);
    }

    private function create($serialNumber, $category): void
    {
        Navigation::create([
            'slug' => Str::uuid()->toString(),
            'serial_number' => $serialNumber,
            'name' => NavigationCategory::tryFrom($category)?->getLabel(),
            'category' => $category
        ]);
    }
}
