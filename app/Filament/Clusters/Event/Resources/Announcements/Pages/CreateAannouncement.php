<?php

namespace App\Filament\Clusters\Event\Resources\Announcements\Pages;

use App\Filament\Clusters\Event\Resources\Announcements\AnnouncementResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAannouncement extends CreateRecord
{
    protected static string $resource = AnnouncementResource::class;
}
