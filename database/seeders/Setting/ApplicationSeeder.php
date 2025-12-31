<?php

namespace Database\Seeders\Setting;

use App\Models\Application;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ApplicationSeeder extends Seeder
{
    public function run(): void
    {
        $application = new Application();
        $application->slug = Str::uuid()->toString();
        $application->name = 'Best School';
        $application->short_name = 'BS';
        $application->save();
    }
}
