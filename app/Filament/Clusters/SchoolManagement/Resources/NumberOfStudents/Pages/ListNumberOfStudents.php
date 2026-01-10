<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents\Pages;

use App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents\NumberOfStudentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListNumberOfStudents extends ListRecords
{
    protected static string $resource = NumberOfStudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
