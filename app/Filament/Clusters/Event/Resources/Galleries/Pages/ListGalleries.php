<?php

namespace App\Filament\Clusters\Event\Resources\Galleries\Pages;

use App\Filament\Clusters\Event\Resources\Galleries\GalleryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGalleries extends ListRecords
{
    protected static string $resource = GalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalWidth('md')
                ->slideOver()
        ];
    }
}
