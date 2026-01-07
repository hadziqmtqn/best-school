<?php

namespace App\Filament\Clusters\Event\Resources\Announcements\Schemas;

use App\Enums\StatusData;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class AannouncementForm
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
                            ->relationship(name: 'institution', titleAttribute: 'name')
                            ->native(false),

                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->placeholder('Masukkan nama'),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->required()
                            ->autosize()
                            ->placeholder('Masukkan deskripsi'),

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
