<?php

namespace App\Filament\Clusters\Reference\Resources\EducationalLevels\Pages;

use App\Filament\Clusters\Reference\Resources\EducationalLevels\EducationalLevelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEducationalLevels extends ListRecords
{
    protected static string $resource = EducationalLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalWidth('md')
        ];
    }
}
