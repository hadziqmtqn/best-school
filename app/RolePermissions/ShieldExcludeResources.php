<?php

namespace App\RolePermissions;

use App\Filament\Clusters\SchoolManagement\Resources\Employees\EmployeeResource;
use App\Filament\Clusters\Setting\Resources\Admins\AdminResource;

class ShieldExcludeResources
{
    public static function list(): array
    {
        return [
            AdminResource::class,
            EmployeeResource::class
        ];
    }
}