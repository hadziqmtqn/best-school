<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class UserRole
{
    private static function has($role): bool
    {
        return Auth::check() && Auth::user()->hasRole($role);
    }

    public static function isSuperAdmin(): bool
    {
        return self::has('super_admin');
    }

    public static function isContributor(): bool
    {
        return self::has('contributor');
    }

    public static function isWriter(): bool
    {
        return self::has('writer');
    }
}