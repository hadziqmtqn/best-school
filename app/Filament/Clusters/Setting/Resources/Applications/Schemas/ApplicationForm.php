<?php

namespace App\Filament\Clusters\Setting\Resources\Applications\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class ApplicationForm
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
                            ->placeholder('Masukkan nama'),

                        TextInput::make('short_name')
                            ->label('Nama Singkatan')
                            ->required()
                            ->placeholder('Masukkan nama singkatan'),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Masukkan deskripsi aplikasi')
                            ->autosize(),

                        SpatieMediaLibraryFileUpload::make('logo')
                            ->label('Logo')
                            ->disk('s3_public')
                            ->collection('logo')
                            ->visibility('public')
                            ->acceptedFileTypes(['image/*'])
                            ->maxSize(300)
                            ->openable(),

                        SpatieMediaLibraryFileUpload::make('favicon')
                            ->label('Favicon')
                            ->disk('s3_public')
                            ->collection('favicon')
                            ->visibility('public')
                            ->acceptedFileTypes(['image/*'])
                            ->maxSize(30)
                            ->openable(),
                    ])
            ]);
    }
}
