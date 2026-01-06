<?php

namespace App\Filament\Clusters\Event\Resources\Agendas\Pages;

use App\Filament\Clusters\Event\Resources\Agendas\AgendaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAgenda extends CreateRecord
{
    protected static string $resource = AgendaResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
