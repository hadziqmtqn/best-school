<?php

namespace App\Filament\Clusters\Setting\Resources\Applications\Pages;

use App\Filament\Clusters\Setting\Resources\Applications\ApplicationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditApplication extends EditRecord
{
    protected static string $resource = ApplicationResource::class;

    protected static ?string $navigationLabel = 'Umum';

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
