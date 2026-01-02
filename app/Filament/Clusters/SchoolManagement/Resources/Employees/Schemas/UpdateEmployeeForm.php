<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas;

use App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features\AddressData;
use App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features\PersonalData;
use Filament\Schemas\Components\Tabs;

class UpdateEmployeeForm
{
    public static function schema(): array
    {
        return [
            Tabs::make()
                ->schema([
                    Tabs\Tab::make('Data Pribadi')
                        ->schema(PersonalData::schemas()),

                    Tabs\Tab::make('Alamat')
                        ->columns()
                        ->schema(AddressData::schema()),
                ])
        ];
    }
}