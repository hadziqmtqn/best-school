<?php

namespace App\RolePermissions;

use App\Enums\BaseRole;
use App\Filament\Clusters\Post\Resources\LeadershipGreetings\LeadershipGreetingResource;
use App\Filament\Clusters\Post\Resources\PostCategories\PostCategoryResource;
use App\Filament\Clusters\Post\Resources\Posts\PostResource;
use App\Filament\Clusters\Reference\Resources\EducationalLevels\EducationalLevelResource;
use App\Filament\Clusters\Reference\Resources\PersonnelDepartments\PersonnelDepartmentResource;
use App\Filament\Clusters\Reference\Resources\SchoolYears\SchoolYearResource;
use App\Filament\Clusters\SchoolManagement\Resources\Institutions\InstitutionResource;
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

            EducationalLevelResource::class => [
                'view_any' => array_keys(BaseRole::options(['super_admin'])),
                'create' => array_keys(BaseRole::options(['super_admin'])),
                'update' => array_keys(BaseRole::options(['super_admin'])),
                'delete' => array_keys(BaseRole::options(['super_admin'])),
            ],

            InstitutionResource::class => [
                'view_any' => array_keys(BaseRole::options()),
                'view' => array_keys(BaseRole::options()),
                'create' => array_keys(BaseRole::options(['super_admin'])),
                'update' => array_keys(BaseRole::options(['super_admin'])),
                'delete' => array_keys(BaseRole::options(['super_admin'])),
                'restore' => array_keys(BaseRole::options(['super_admin'])),
                'force_delete' => array_keys(BaseRole::options(['super_admin']))
            ],

            SchoolYearResource::class => [
                'view_any' => array_keys(BaseRole::options(['super_admin'])),
                'create' => array_keys(BaseRole::options(['super_admin'])),
                'update' => array_keys(BaseRole::options(['super_admin'])),
                'delete' => array_keys(BaseRole::options(['super_admin'])),
            ],

            PostCategoryResource::class => [
                'view_any' => array_keys(BaseRole::options()),
                'view' => array_keys(BaseRole::options()),
                'create' => array_keys(BaseRole::options(['super_admin', 'writer'])),
                'update' => array_keys(BaseRole::options(['super_admin', 'writer'])),
                'delete' => array_keys(BaseRole::options(['super_admin', 'writer'])),
                'restore' => array_keys(BaseRole::options(['super_admin', 'writer'])),
                'force_delete' => array_keys(BaseRole::options(['super_admin']))
            ],

            PostResource::class => [
                'view_any' => array_keys(BaseRole::options()),
                'view' => array_keys(BaseRole::options()),
                'create' => array_keys(BaseRole::options(['super_admin', 'writer'])),
                'update' => array_keys(BaseRole::options()),
                'delete' => array_keys(BaseRole::options(['super_admin', 'writer'])),
                'restore' => array_keys(BaseRole::options(['super_admin', 'writer'])),
                'force_delete' => array_keys(BaseRole::options(['super_admin']))
            ],

            LeadershipGreetingResource::class => [
                'view_any' => array_keys(BaseRole::options(['super_admin'])),
                'create' => array_keys(BaseRole::options(['super_admin'])),
                'update' => array_keys(BaseRole::options(['super_admin'])),
                'delete' => array_keys(BaseRole::options(['super_admin'])),
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
            ],

            'employee' => [
                'view_any' => array_keys(BaseRole::options()),
                'create' => array_keys(BaseRole::options(['super_admin'])),
                'update' => array_keys(BaseRole::options()),
                'delete' => array_keys(BaseRole::options(['super_admin'])),
                'restore' => array_keys(BaseRole::options(['super_admin'])),
                'force_delete' => array_keys(BaseRole::options(['super_admin'])),
            ],

            'homebase' => [
                'view_any' => array_keys(BaseRole::options()),
                'create' => array_keys(BaseRole::options(['super_admin'])),
                'update' => array_keys(BaseRole::options(['super_admin'])),
                'delete' => array_keys(BaseRole::options(['super_admin'])),
                'restore' => array_keys(BaseRole::options(['super_admin'])),
                'force_delete' => array_keys(BaseRole::options(['super_admin'])),
            ],

            'employee_position' => [
                'view_any' => array_keys(BaseRole::options()),
                'create' => array_keys(BaseRole::options(['super_admin'])),
                'update' => array_keys(BaseRole::options(['super_admin'])),
                'delete' => array_keys(BaseRole::options(['super_admin'])),
                'restore' => array_keys(BaseRole::options(['super_admin'])),
                'force_delete' => array_keys(BaseRole::options(['super_admin'])),
            ],

            'educational_history' => [
                'view_any' => array_keys(BaseRole::options()),
                'create' => array_keys(BaseRole::options(['super_admin'])),
                'update' => array_keys(BaseRole::options(['super_admin'])),
                'delete' => array_keys(BaseRole::options(['super_admin'])),
                'restore' => array_keys(BaseRole::options(['super_admin'])),
                'force_delete' => array_keys(BaseRole::options(['super_admin'])),
            ],
        ];
    }
}