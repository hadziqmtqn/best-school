<?php

namespace App\Filament\Clusters\Post\Resources\PostCategories\Pages;

use App\Filament\Clusters\Post\Resources\PostCategories\PostCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPostCategories extends ListRecords
{
    protected static string $resource = PostCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalWidth('md')
        ];
    }
}
