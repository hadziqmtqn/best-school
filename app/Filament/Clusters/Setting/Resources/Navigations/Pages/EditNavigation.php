<?php

namespace App\Filament\Clusters\Setting\Resources\Navigations\Pages;

use App\Filament\Clusters\Setting\Resources\Navigations\NavigationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditNavigation extends EditRecord
{
    protected static string $resource = NavigationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
