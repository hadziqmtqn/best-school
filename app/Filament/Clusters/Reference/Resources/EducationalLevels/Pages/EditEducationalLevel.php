<?php

namespace App\Filament\Clusters\Reference\Resources\EducationalLevels\Pages;

use App\Filament\Clusters\Reference\Resources\EducationalLevels\EducationalLevelResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEducationalLevel extends EditRecord
{
    protected static string $resource = EducationalLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
