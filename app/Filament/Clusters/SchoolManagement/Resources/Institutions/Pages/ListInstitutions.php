<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Institutions\Pages;

use App\Filament\Clusters\SchoolManagement\Resources\Institutions\InstitutionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInstitutions extends ListRecords
{
    protected static string $resource = InstitutionResource::class;

    protected static ?string $title = 'Lembaga';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalWidth('lg')
        ];
    }
}
