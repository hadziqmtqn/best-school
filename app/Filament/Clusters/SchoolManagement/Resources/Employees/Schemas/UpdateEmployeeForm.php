<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas;

use App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features\AddressData;
use App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features\PersonalData;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
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

                    Tabs\Tab::make('Foto')
                        ->schema([
                            SpatieMediaLibraryFileUpload::make('avatar')
                                ->label('Foto')
                                ->disk('s3_public')
                                ->collection('avatar')
                                ->visibility('public')
                                ->image()
                                ->maxSize(200)
                                ->openable()
                                ->deletable()
                        ])
                ])
        ];
    }
}