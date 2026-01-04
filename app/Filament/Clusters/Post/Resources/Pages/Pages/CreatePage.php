<?php

namespace App\Filament\Clusters\Post\Resources\Pages\Pages;

use App\Enums\PostType;
use App\Filament\Clusters\Post\Resources\Pages\PageResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    protected static string $resource = PageResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = PostType::PAGE->value;

        return $data;
    }
}
