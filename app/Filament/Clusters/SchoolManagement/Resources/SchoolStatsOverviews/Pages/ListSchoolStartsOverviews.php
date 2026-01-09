<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\SchoolStatsOverviews\Pages;

use App\Filament\Clusters\SchoolManagement\Resources\SchoolStatsOverviews\SchoolStatsOverviewResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSchoolStartsOverviews extends ListRecords
{
    protected static string $resource = SchoolStatsOverviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->modalWidth('md')
        ];
    }
}
