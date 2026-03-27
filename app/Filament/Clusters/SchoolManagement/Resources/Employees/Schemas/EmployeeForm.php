<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas;

use App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features\PersonalData;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                PersonalData::schema(),
            ]);
    }
}
