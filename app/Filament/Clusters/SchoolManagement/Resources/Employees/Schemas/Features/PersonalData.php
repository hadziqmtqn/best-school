<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features;

use App\Enums\Gender;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;

class PersonalData
{
    public static function schema()
    {
        return Section::make('Data Pribadi')
            ->description('Informasi identitas dasar pegawai yang digunakan sebagai data utama.')
            ->columnSpanFull()
            ->columns()
            ->aside()
            ->schema([
                TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->placeholder('Masukkan nama lengkap'),

                Group::make()
                    ->relationship('employee')
                    ->schema([
                        TextInput::make('place_of_birth')
                            ->label('Tempat Lahir')
                            ->placeholder('Masukkan tempat lahir')
                    ]),

                Group::make()
                    ->relationship('employee')
                    ->schema([
                        DatePicker::make('date_of_birth')
                            ->label('Tempat Lahir')
                            ->date()
                            ->placeholder('Masukkan tempat lahir')
                            ->maxDate(now()->subYears(10))
                            ->native(false)
                            ->closeOnDateSelection()
                    ]),

                Group::make()
                    ->relationship('employee')
                    ->schema([
                        Radio::make('gender')
                            ->label('Jenis Kelamin')
                            ->options(Gender::options())
                            ->required()
                            ->inline()
                    ]),

                Group::make()
                    ->relationship('employee')
                    ->schema([
                        Select::make('religion')
                            ->label('Agama')
                            ->options(
                                collect(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Khonghuchu'])
                                    ->mapWithKeys(fn($item) => [$item => $item])
                                    ->toArray()
                            )
                            ->native(false)
                    ]),

                TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->placeholder('Masukkan Email valid')
            ]);
    }
}