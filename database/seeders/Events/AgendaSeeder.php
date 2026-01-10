<?php

namespace Database\Seeders\Events;

use App\Models\Agenda;
use Illuminate\Database\Seeder;

class AgendaSeeder extends Seeder
{
    public function run(): void
    {
        Agenda::factory(10)
            ->create();
    }
}
