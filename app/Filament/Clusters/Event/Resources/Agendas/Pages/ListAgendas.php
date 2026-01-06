<?php

namespace App\Filament\Clusters\Event\Resources\Agendas\Pages;

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
        ];
    }
}
