<?php

namespace App\Filament\Clusters\Reference\Resources\Rombels\Pages;

use App\Filament\Clusters\Reference\Resources\Rombels\RombelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRombels extends ListRecords
{
    protected static string $resource = RombelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->modalWidth('md')
        ];
    }
}
