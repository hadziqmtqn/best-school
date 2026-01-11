<?php

namespace App\Filament\Clusters\Setting\Resources\Applications\Schemas;

use App\Enums\Theme;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->columns()
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->placeholder('Masukkan nama'),

                        TextInput::make('short_name')
                            ->label('Nama Singkatan')
                            ->required()
                            ->placeholder('Masukkan nama singkatan'),

                        Select::make('theme')
                            ->label('Tema')
                            ->options(Theme::options())
                            ->required()
                            ->native(false),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Masukkan deskripsi aplikasi')
                            ->autosize()
                            ->columnSpanFull(),

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
