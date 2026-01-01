<?php

namespace App\Filament\Clusters\Reference\Resources\PersonnelDepartments\Pages;

use App\Filament\Clusters\Reference\Resources\PersonnelDepartments\PersonnelDepartmentResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePersonnelDepartment extends CreateRecord
{
    protected static string $resource = PersonnelDepartmentResource::class;
}
