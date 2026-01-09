<?php

namespace App\Filament\Clusters\Reference\Resources\Classrooms\Pages;

use App\Filament\Clusters\Reference\Resources\Classrooms\ClassroomResource;
use Filament\Resources\Pages\CreateRecord;

class CreateClassroom extends CreateRecord
{
    protected static string $resource = ClassroomResource::class;
}
