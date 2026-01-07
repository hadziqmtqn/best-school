<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Extracurriculars\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class ExtracurricularForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make()
                    ->columnSpanFull()
                    ->schema([
                        Tabs\Tab::make('Data Utama')
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
                                    ->placeholder('Masukkan deskripsi'),
                            ]),

                        Tabs\Tab::make('Galeri')
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('images')
                                    ->label('Gambar')
                                    ->disk('s3_public')
                                    ->visibility('public')
                                    ->collection('images')
                                    ->image()
                                    ->multiple()
                                    ->openable()
                                    ->deletable()
                                    ->maxSize(300)
                            ])
                    ]),
            ]);
    }
}
