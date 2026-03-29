<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\EmployeePositions\Pages;

use App\Filament\Clusters\SchoolManagement\Resources\EmployeePositions\EmployeePositionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEmployeePositions extends ListRecords
{
    protected static string $resource = EmployeePositionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
