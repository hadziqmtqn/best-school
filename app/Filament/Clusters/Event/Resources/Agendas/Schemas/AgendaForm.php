<?php

namespace App\Filament\Clusters\Event\Resources\Agendas\Schemas;

use App\Enums\StatusData;
use App\Repositories\SchoolManagements\InstitutionRepository;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class AgendaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->columnSpanFull()
                    ->schema([
                        Select::make('institution_id')
                            ->label('Lembaga')
                            ->options(InstitutionRepository::options())
                            ->native(false),

                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->placeholder('Masukkan nama'),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->autosize()
                            ->placeholder('Masukkan deskripsi'),

                        DateTimePicker::make('start_date')
                            ->label('Mulai')
                            ->required()
                            ->native(false)
                            ->placeholder('Masukkan tanggal mulai')
                            ->closeOnDateSelection(),

                        DateTimePicker::make('end_date')
                            ->label('Sampai')
                            ->required()
                            ->native(false)
                            ->placeholder('Masukkan tanggal sampai')
                            ->closeOnDateSelection(),

                        TextInput::make('location')
                            ->label('Lokasi')
                            ->required()
                            ->placeholder('Masukkan nama lokasi'),

                        ToggleButtons::make('status')
                            ->label('Status')
                            ->options(StatusData::options())
                            ->required()
                            ->inline(),

                        Radio::make('is_active')
                            ->label('Status Aktif')
                            ->boolean()
                            ->required()
                            ->inline()
                    ])
            ]);
    }
}
