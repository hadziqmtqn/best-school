<?php

namespace Database\Seeders\Auth;

use App\Enums\BaseRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        $baseRole = BaseRole::options();

        foreach ($baseRole as $key => $item) {
            Role::create([
                'name' => $key
            ]);
        }
    }
}
