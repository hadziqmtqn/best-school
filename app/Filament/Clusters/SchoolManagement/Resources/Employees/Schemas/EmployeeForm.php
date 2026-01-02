<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas;

use App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features\EducationalHistoryData;
use App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features\EmployeePositionData;
use App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features\HomebaseData;
use App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features\PersonalData;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                PersonalData::schema(),

                HomebaseData::schema(),

                EmployeePositionData::schema(),

                EducationalHistoryData::schema()
            ]);
    }
}
