<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Pages;

use App\Filament\Clusters\SchoolManagement\Resources\Employees\EmployeeResource;
use App\Helpers\CanAccess;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeeResource::class;

    protected static ?string $title = 'Pegawai';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Baru')
                ->visible(CanAccess::to('CreateEmployee'))
        ];
    }
}
