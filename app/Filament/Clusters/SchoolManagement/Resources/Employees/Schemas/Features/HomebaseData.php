<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Group;

class HomebaseData
{
    public static function schemas(): array
    {
        return [
            Group::make()
                ->columnSpanFull()
                ->schema([
                    Select::make('institution_id')
                        ->label('Lembaga')
                        ->relationship(name: 'institution', titleAttribute: 'name')
                        ->native(false)
                        ->required(),

                    DatePicker::make('appointment_date')
                        ->label('Terhitung Mulai Tanggal')
                        ->date()
                        ->native(false)
                        ->maxDate(now())
                        ->placeholder('Masukkan terhitung mulai tanggal')
                        ->closeOnDateSelection(),

                    Radio::make('is_active')
                        ->label('Aktifkan')
                        ->boolean()
                        ->inline()
                        ->required()
                ])
        ];
    }
}