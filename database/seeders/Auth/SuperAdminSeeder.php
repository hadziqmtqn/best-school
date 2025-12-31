<?php

namespace Database\Seeders\Auth;

use App\Enums\BaseRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        $user = new User();
        $user->username = 'super-admin';
        $user->name = 'Super Admin';
        $user->email = 'superadmin@bkn.my.id';
        $user->password = Hash::make('superadmin');
        $user->email_verified_at = now();
        $user->save();

        $user->assignRole(BaseRole::SUPER_ADMIN->value);
    }
}
