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
            ->schema(self::schemas());
    }

    public static function schemas(): array
    {
        return [
            TextInput::make('name')
                ->label('Nama Lengkap')
                ->required()
                ->placeholder('Masukkan nama lengkap'),

            TextInput::make('email')
                ->label('Email')
                ->required()
                ->unique(ignoreRecord: true)
                ->placeholder('Masukkan Email valid'),

            Group::make()
                ->relationship('employee')
                ->columnSpanFull()
                ->columns()
                ->schema([
                    TextInput::make('place_of_birth')
                        ->label('Tempat Lahir')
                        ->placeholder('Masukkan tempat lahir'),

                    DatePicker::make('date_of_birth')
                        ->label('Tempat Lahir')
                        ->date()
                        ->placeholder('Masukkan tempat lahir')
                        ->maxDate(now()->subYears(10))
                        ->native(false)
                        ->closeOnDateSelection(),

                    Radio::make('gender')
                        ->label('Jenis Kelamin')
                        ->options(Gender::options())
                        ->required()
                        ->inline(),

                    Select::make('religion')
                        ->label('Agama')
                        ->options(
                            collect(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Khonghuchu'])
                                ->mapWithKeys(fn($item) => [$item => $item])
                                ->toArray()
                        )
                        ->native(false),

                    TextInput::make('nuptk')
                        ->label('NUPTK')
                        ->placeholder('Masukkan NUPTK'),

                    TextInput::make('nip')
                        ->label('NIP')
                        ->placeholder('Masukkan NIP'),
                ]),
        ];
    }
}