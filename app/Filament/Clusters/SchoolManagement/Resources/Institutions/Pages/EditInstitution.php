<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Institutions\Pages;

use App\Filament\Clusters\SchoolManagement\Resources\Institutions\InstitutionResource;
use Filament\Resources\Pages\EditRecord;

class EditInstitution extends EditRecord
{
    protected static string $resource = InstitutionResource::class;

    protected static ?string $title = 'Ubah Lembaga';

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
