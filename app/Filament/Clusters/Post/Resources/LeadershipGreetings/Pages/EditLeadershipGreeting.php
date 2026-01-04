<?php

namespace App\Filament\Clusters\Post\Resources\LeadershipGreetings\Pages;

use App\Filament\Clusters\Post\Resources\LeadershipGreetings\LeadershipGreetingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLeadershipGreeting extends EditRecord
{
    protected static string $resource = LeadershipGreetingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
