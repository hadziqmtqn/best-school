<?php

namespace App\RolePermissions;

use App\Enums\BaseRole;
use App\Filament\Clusters\Reference\Resources\PersonnelDepartments\PersonnelDepartmentResource;
use App\Filament\Clusters\Setting\Resources\Applications\ApplicationResource;
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

            ApplicationResource::class => [
                'view_any' => array_keys(BaseRole::options(['super_admin'])),
                'update' => array_keys(BaseRole::options(['super_admin'])),
            ],

            PersonnelDepartmentResource::class => [
                'view_any' => array_keys(BaseRole::options(['super_admin'])),
                'view' => array_keys(BaseRole::options(['super_admin'])),
                'create' => array_keys(BaseRole::options(['super_admin'])),
                'update' => array_keys(BaseRole::options(['super_admin'])),
                'delete' => array_keys(BaseRole::options(['super_admin'])),
                'restore' => array_keys(BaseRole::options(['super_admin'])),
                'force_delete' => array_keys(BaseRole::options(['super_admin']))
            ],
        ];
    }

    public static function customPermissions(): array
    {
        return [
            'admin' => [
                'view_any' => array_keys(BaseRole::options()),
                'create' => array_keys(BaseRole::options(['super_admin'])),
                'update' => array_keys(BaseRole::options()),
                'delete' => array_keys(BaseRole::options(['super_admin'])),
                'restore' => array_keys(BaseRole::options(['super_admin'])),
                'force_delete' => array_keys(BaseRole::options(['super_admin'])),
            ]
        ];
    }
}