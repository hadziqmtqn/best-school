<?php

namespace App\Filament\Clusters\Reference\Resources\PersonnelDepartments\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class PersonnelDepartmentForm
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
                            ->placeholder('Masukkan nama jabatan pegawai'),

                        TextInput::make('level')
                            ->label('Level')
                            ->required()
                            ->placeholder('Masukkan level jabatan')
                            ->numeric(),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->autosize()
                            ->placeholder('Masukkan deskripsi jabatan')
                    ])
            ]);
    }
}
