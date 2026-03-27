<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents\Pages;

use App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents\NumberOfStudentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNumberOfStudent extends CreateRecord
{
    protected static string $resource = NumberOfStudentResource::class;
}
