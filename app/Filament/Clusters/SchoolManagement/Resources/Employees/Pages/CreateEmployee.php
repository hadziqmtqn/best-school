<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Pages;

use App\Filament\Clusters\SchoolManagement\Resources\Employees\EmployeeResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password'] = Hash::make(Str::random());

        return $data;
    }
}
