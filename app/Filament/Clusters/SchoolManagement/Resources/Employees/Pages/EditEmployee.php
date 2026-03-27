<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Pages;

use App\Filament\Clusters\SchoolManagement\Resources\Employees\EmployeeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEmployee extends EditRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
