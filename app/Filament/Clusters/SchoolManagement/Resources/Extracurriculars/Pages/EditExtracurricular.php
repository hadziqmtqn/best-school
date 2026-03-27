<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Extracurriculars\Pages;

use App\Filament\Clusters\SchoolManagement\Resources\Extracurriculars\ExtracurricularResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditExtracurricular extends EditRecord
{
    protected static string $resource = ExtracurricularResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
