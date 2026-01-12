<?php

namespace App\Filament\Clusters\Setting\Resources\Navigations\Pages;

use App\Filament\Clusters\Setting\Resources\Navigations\NavigationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListNavigations extends ListRecords
{
    protected static string $resource = NavigationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
