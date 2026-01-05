<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Extracurriculars\Pages;

use App\Filament\Clusters\SchoolManagement\Resources\Extracurriculars\ExtracurricularResource;
use Filament\Resources\Pages\CreateRecord;

class CreateExtracurricular extends CreateRecord
{
    protected static string $resource = ExtracurricularResource::class;
}
