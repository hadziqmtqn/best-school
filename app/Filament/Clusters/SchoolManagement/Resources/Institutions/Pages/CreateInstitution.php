<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Institutions\Pages;

use App\Filament\Clusters\SchoolManagement\Resources\Institutions\InstitutionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInstitution extends CreateRecord
{
    protected static string $resource = InstitutionResource::class;
}
