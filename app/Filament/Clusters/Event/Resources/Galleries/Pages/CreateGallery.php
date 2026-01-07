<?php

namespace App\Filament\Clusters\Event\Resources\Galleries\Pages;

use App\Filament\Clusters\Event\Resources\Galleries\GalleryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGallery extends CreateRecord
{
    protected static string $resource = GalleryResource::class;
}
