<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Institutions\Schemas;

use App\Filament\GlobalSchemas\IdnLocationForm;
use App\Models\EducationalLevel;
use App\Repositories\References\EducationalLevelRepository;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class InstitutionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make()
                    ->columnSpanFull()
                    ->schema([
                        Tabs\Tab::make('Data Utama')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama')
                                    ->required()
                                    ->placeholder('Masukkan nama lembaga'),

                                Select::make('educational_level_id')
                                    ->label('Jenjang Pendidikan')
                                    ->options(collect(EducationalLevelRepository::options())->map(fn($item) => $item['fullName'])->toArray())
                                    ->required()
                                    ->native(false)
                                    ->exists(EducationalLevel::class, 'id'),

                                TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->placeholder('Masukkan email'),

                                TextInput::make('phone_number')
                                    ->label('No. Telp')
                                    ->placeholder('Masukkan No. Telp'),
                            ]),

                        Tabs\Tab::make('Lokasi')
                            ->schema([
                                IdnLocationForm::province(),
                                IdnLocationForm::city(),
                                IdnLocationForm::district(),
                                IdnLocationForm::village(),
                                IdnLocationForm::street(),
                                IdnLocationForm::postalCode(),
                            ])
                    ])
            ]);
    }
}
