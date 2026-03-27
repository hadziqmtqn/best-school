<?php

namespace App\Filament\Clusters\Reference\Resources\EducationalLevels\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class EducationalLevelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('full_name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->placeholder('Masukkan nama lengkap jenjang'),

                        TextInput::make('short_name')
                            ->label('Nama Singkatan')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('Masukkan nama singkatan jenjang')
                    ])
            ]);
    }
}
