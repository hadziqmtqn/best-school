<?php

namespace App\Filament\Clusters\Event\Resources\Agendas\Pages;

use App\Enums\StatusData;
use App\Filament\Clusters\Event\Resources\Agendas\AgendaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAgendas extends ListRecords
{
    protected static string $resource = AgendaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->modalWidth('md')
                ->mutateDataUsing(function (array $data): array {
                    $data['user_id'] = auth()->id();

                    if ($data['status'] === StatusData::PUBLISHED->value) {
                        $data['validated_by'] = auth()->id();
                    }

                    return $data;
                })
        ];
    }
}
