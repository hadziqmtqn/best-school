<?php

namespace App\Filament\Clusters\Setting\Resources\Applications\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MoreInfoForm
{
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->columns()
                    ->schema([
                        TextInput::make('more_info.accreditation_score')
                            ->label('Nilai Akreditasi')
                            ->placeholder('Nilai akreditasi lembaga'),

                        TextInput::make('more_info.accreditation_name')
                            ->label('Nama Akreditasi')
                            ->placeholder('Nama akreditasi lembaga'),
                    ])
            ]);
    }
}
