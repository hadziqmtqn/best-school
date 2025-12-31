<?php

namespace App\RolePermissions;

use App\Enums\BaseRole;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PermissionGenerator
{
    public static function generate(): array
    {
        $rows = [];

        try {
            $roleAccess = RoleAccess::list();

            foreach ($roleAccess as $resource => $permissionMap) {

                // otomatis slug dari nama Resource
                $slug = class_exists($resource)
                    ? Str::of(class_basename($resource))
                        ->replace('Resource', '')
                        ->snake()
                        ->toString()
                    : Str::of($resource)
                        ->snake()
                        ->toString();

                // ambil permission dari KEYS roleAccess
                foreach ($permissionMap as $perm => $allowedRoles) {

                    $name = $perm . "_" . $slug;

                    // Default semua role = NO
                    $row = ['name' => $name];

                    foreach (array_keys(BaseRole::options()) as $role) {
                        $row[$role] = in_array($role, $allowedRoles) ? 'YES' : 'NO';
                    }

                    $rows[] = $row;
                }
            }
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
        }

        return $rows;
    }
}