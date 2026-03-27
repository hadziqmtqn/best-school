<?php

namespace App\Filament\Clusters\Reference\Resources\Rombels\Pages;

use App\Filament\Clusters\Reference\Resources\Rombels\RombelResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditRombel extends EditRecord
{
    protected static string $resource = RombelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
