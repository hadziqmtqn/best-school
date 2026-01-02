<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Pages;

use App\Filament\Clusters\SchoolManagement\Resources\Employees\EmployeeResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;

    protected static ?string $title = 'Tambah Pegawai';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        dd(request()->all());
        return $data;
    }

    protected function handleRecordCreation(array $data): Model
    {
        dd('$data');
        return static::getModel()::create($data);
    }
}
