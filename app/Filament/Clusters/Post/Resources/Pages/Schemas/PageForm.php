<?php

namespace App\Filament\Clusters\Post\Resources\Pages\Schemas;

use App\Filament\Clusters\Post\Resources\Posts\Schemas\PostForm;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return PostForm::configure(
            schema: $schema,
            useCategory: false,
            useTag: false,
            useAllowComment: false
        );
    }
}
