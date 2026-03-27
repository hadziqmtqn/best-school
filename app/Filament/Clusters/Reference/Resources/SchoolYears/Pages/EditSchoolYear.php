<?php

namespace App\Filament\Clusters\Reference\Resources\SchoolYears\Pages;

use App\Filament\Clusters\Reference\Resources\SchoolYears\SchoolYearResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSchoolYear extends EditRecord
{
    protected static string $resource = SchoolYearResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
