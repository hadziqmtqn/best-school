<?php

namespace App\Filament\Clusters\Post\Resources\LeadershipGreetings\Pages;

use App\Filament\Clusters\Post\Resources\LeadershipGreetings\LeadershipGreetingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLeadershipGreetings extends ListRecords
{
    protected static string $resource = LeadershipGreetingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
