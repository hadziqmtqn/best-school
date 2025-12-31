<?php

namespace App\RolePermissions;

class CustomPermissions
{
    public static function permissions(): array
    {
        $permissions = [];

        $custom = RoleAccess::customPermissions();

        foreach ($custom as $slug => $permissionMap) {

            foreach ($permissionMap as $perm => $roles) {

                // hasil: "view_any" + "_" + "conversation"
                $permissions[] = $perm . "_" . $slug;
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