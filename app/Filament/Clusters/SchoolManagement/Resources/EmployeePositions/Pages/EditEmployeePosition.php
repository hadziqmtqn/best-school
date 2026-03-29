<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\EmployeePositions\Pages;

use App\Filament\Clusters\SchoolManagement\Resources\EmployeePositions\EmployeePositionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditEmployeePosition extends EditRecord
{
    protected static string $resource = EmployeePositionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
