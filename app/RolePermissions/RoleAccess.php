<?php

namespace App\RolePermissions;

use App\Enums\BaseRole;
use BezhanSalleh\FilamentShield\Resources\Roles\RoleResource;

class RoleAccess
{
    public static function list(): array
    {
        return array_merge(
            static::mainPermissions(),
            static::customPermissions()
        );
    }

    public static function mainPermissions(): array
    {
        return [
            RoleResource::class => [
                'view_any' => array_keys(BaseRole::options(['super_admin'])),
                'view' => array_keys(BaseRole::options(['super_admin'])),
                'create' => array_keys(BaseRole::options(['super_admin'])),
                'update' => array_keys(BaseRole::options(['super_admin'])),
                'delete' => array_keys(BaseRole::options(['super_admin'])),
                'delete_any' => array_keys(BaseRole::options(['super_admin'])),
                'restore' => array_keys(BaseRole::options(['super_admin'])),
                'restore_any' => array_keys(BaseRole::options(['super_admin'])),
                'force_delete' => array_keys(BaseRole::options(['super_admin'])),
                'force_delete_any' => array_keys(BaseRole::options(['super_admin'])),
            ],
        ];
    }

    public static function customPermissions(): array
    {
        return [];
    }
}