<?php

namespace App\Filament\Clusters\Reference\Resources\Classrooms\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class ClassroomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->placeholder('Masukkan nama')
                    ])
            ]);
    }
}
