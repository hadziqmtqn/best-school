<?php

namespace App\Filament\Clusters\Post\Resources\LeadershipGreetings\Pages;

use App\Filament\Clusters\Post\Resources\LeadershipGreetings\LeadershipGreetingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLeadershipGreeting extends CreateRecord
{
    protected static string $resource = LeadershipGreetingResource::class;
}
