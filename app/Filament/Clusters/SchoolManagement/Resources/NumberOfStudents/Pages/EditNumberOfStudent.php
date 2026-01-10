<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents\Pages;

use App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents\NumberOfStudentResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditNumberOfStudent extends EditRecord
{
    protected static string $resource = NumberOfStudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
