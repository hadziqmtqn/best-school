<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features;

use App\Filament\GlobalSchemas\IdnLocationForm;

class AddressData
{
    public static function schema(): array
    {
        return [
            IdnLocationForm::province(),
            IdnLocationForm::city(),
            IdnLocationForm::district(),
            IdnLocationForm::village(),
            IdnLocationForm::street(),
            IdnLocationForm::postalCode(),
        ];
    }
}