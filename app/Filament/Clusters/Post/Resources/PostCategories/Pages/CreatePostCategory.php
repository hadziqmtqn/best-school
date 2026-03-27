<?php

namespace App\Filament\Clusters\Post\Resources\PostCategories\Pages;

use App\Filament\Clusters\Post\Resources\PostCategories\PostCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePostCategory extends CreateRecord
{
    protected static string $resource = PostCategoryResource::class;
}
