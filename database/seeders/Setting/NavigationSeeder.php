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
        $this->create(NavigationCategory::SCHOOL_IDENTITY->value, NavigationCategory::SCHOOL_IDENTITY->getLabel());
        $this->create(NavigationCategory::PROGRAM->value, NavigationCategory::PROGRAM->getLabel());
        $this->create(NavigationCategory::GALLERY->value, NavigationCategory::GALLERY->getLabel());
        $this->create(NavigationCategory::EVENT->value, NavigationCategory::EVENT->getLabel());
        $this->create(null, 'SPMB Online', 'https://ppdb.bkn.my.id', true);
    }

    private function create($category, $name, $url = null, $openNewTab = false): void
    {
        Navigation::create([
            'slug' => Str::uuid()->toString(),
            'serial_number' => Navigation::max('serial_number') + 1,
            'name' => $name,
            'category' => $category,
            'url' => $url,
            'open_new_tab' => $openNewTab
        ]);
    }
}
