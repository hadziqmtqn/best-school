<?php

namespace App\Filament\Clusters\Post\Resources\Posts\Pages;

use App\Enums\PostType;
use App\Filament\Clusters\Post\Resources\Posts\PostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = PostType::POST->value;

        return $data;
    }
}
