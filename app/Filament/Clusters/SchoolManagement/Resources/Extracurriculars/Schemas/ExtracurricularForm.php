<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Extracurriculars\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class ExtracurricularForm
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
                            ->required()
                            ->native(false),

                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->placeholder('Masukkan nama'),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->autosize()
                            ->placeholder('Masukkan deskripsi')
                    ])
            ]);
    }
}
