<?php

namespace Database\Seeders;

use Database\Seeders\Auth\PermissionSeeder;
use Database\Seeders\Auth\SuperAdminSeeder;
use Database\Seeders\Setting\ApplicationSeeder;
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
            ApplicationSeeder::class
        ]);
    }
}
