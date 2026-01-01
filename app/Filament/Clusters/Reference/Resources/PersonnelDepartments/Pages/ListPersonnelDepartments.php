<?php

namespace App\Filament\Clusters\Reference\Resources\PersonnelDepartments\Pages;

use App\Filament\Clusters\Reference\Resources\PersonnelDepartments\PersonnelDepartmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPersonnelDepartments extends ListRecords
{
    protected static string $resource = PersonnelDepartmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
