<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\EmployeePositions\Pages;

use App\Filament\Clusters\SchoolManagement\Resources\EmployeePositions\EmployeePositionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployeePosition extends CreateRecord
{
    protected static string $resource = EmployeePositionResource::class;
}
