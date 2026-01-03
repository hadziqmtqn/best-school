<?php

namespace App\Filament\Clusters\Reference\Resources\SchoolYears\Pages;

use App\Filament\Clusters\Reference\Resources\SchoolYears\SchoolYearResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSchoolYears extends ListRecords
{
    protected static string $resource = SchoolYearResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalWidth('md')
        ];
    }
}
