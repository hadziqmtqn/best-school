<?php

namespace Database\Seeders\Events;

use App\Models\Announcement;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        Announcement::factory(10)
            ->create();
    }
}
