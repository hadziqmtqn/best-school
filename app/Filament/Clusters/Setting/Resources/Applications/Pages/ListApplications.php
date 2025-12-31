<?php

namespace App\Filament\Clusters\Setting\Resources\Applications\Pages;

use App\Filament\Clusters\Setting\Resources\Applications\ApplicationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListApplications extends ListRecords
{
    protected static string $resource = ApplicationResource::class;

    protected static ?string $title = 'Aplikasi';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
