<?php

namespace App\Filament\Clusters\Post\Resources\PostCategories\Pages;

use App\Filament\Clusters\Post\Resources\PostCategories\PostCategoryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewPostCategory extends ViewRecord
{
    protected static string $resource = PostCategoryResource::class;

    public function getSubheading(): string|Htmlable
    {
        return $this->record->name;
    }

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
