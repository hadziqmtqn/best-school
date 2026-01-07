<?php

namespace App\Filament\Clusters\Event\Resources\Announcements\Pages;

use App\Enums\StatusData;
use App\Filament\Clusters\Event\Resources\Announcements\AnnouncementResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAannouncements extends ListRecords
{
    protected static string $resource = AnnouncementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->mutateDataUsing(function (array $data): array {
                    $data['user_id'] = auth()->id();

                    if ($data['status'] === StatusData::PUBLISHED->value) {
                        $data['validated_by'] = auth()->id();
                        $data['published_at'] = now();
                    }

                    return $data;
                })
        ];
    }
}
