<?php

namespace App\Filament\Clusters\Event\Resources\Agendas\Pages;

use App\Filament\Clusters\Event\Resources\Agendas\AgendaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAgenda extends CreateRecord
{
    protected static string $resource = AgendaResource::class;
}
