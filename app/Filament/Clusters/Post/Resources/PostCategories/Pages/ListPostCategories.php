<?php

namespace App\Filament\Clusters\Post\Resources\PostCategories\Pages;

use App\Filament\Clusters\Post\Resources\PostCategories\PostCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPostCategories extends ListRecords
{
    protected static string $resource = PostCategoryResource::class;

    protected static ?string $title = 'Kategori Post';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Baru')
                ->modalHeading('Tambah Kategori Post')
                ->modalWidth('md')
        ];
    }
}
