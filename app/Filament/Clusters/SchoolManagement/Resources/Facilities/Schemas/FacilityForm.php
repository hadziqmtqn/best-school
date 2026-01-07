<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Facilities\Schemas;

use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class FacilityForm
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
                                    ->native(false),

                                TextInput::make('name')
                                    ->label('Nama')
                                    ->required()
                                    ->placeholder('Masukkan nama fasilitas'),

                                Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->autosize()
                                    ->placeholder('Masukkan deskripsi fasilitas'),

                                TextInput::make('construction_year')
                                    ->label('Tahun Pembangunan')
                                    ->numeric()
                                    ->rules([
                                        'min_digits:4',
                                        'max_digits:4'
                                    ])
                                    ->placeholder('Masukkan tahun pembangunan'),

                                Radio::make('is_active')
                                    ->label('Aktifkan')
                                    ->required()
                                    ->boolean()
                                    ->inline()
                            ]),

                        Tabs\Tab::make('Galeri')
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('galeries')
                                    ->label('Galeri')
                                    ->disk('s3_public')
                                    ->visibility('public')
                                    ->collection('galeries')
                                    ->image()
                                    ->multiple()
                                    ->openable()
                                    ->deletable()
                            ])
                    ]),
            ]);
    }
}
