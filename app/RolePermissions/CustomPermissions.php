<?php

namespace App\RolePermissions;

use Illuminate\Support\Str;

class CustomPermissions
{
    public static function permissions(): array
    {
        $permissions = [];

        $custom = RoleAccess::customPermissions();

        foreach ($custom as $slug => $permissionMap) {
            foreach ($permissionMap as $perm => $roles) {
                $permissions[] = Str::of($perm)->studly()->toString() . ':' . Str::of($slug)->studly()->toString();
            }
        }

        return array_merge($permissions, self::otherPermission());
    }

    private static function otherPermission(): array
    {
        return [
            //
        ];
    }
}