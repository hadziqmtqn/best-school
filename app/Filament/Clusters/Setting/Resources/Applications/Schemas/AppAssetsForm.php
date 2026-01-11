<?php

namespace App\Filament\Clusters\Setting\Resources\Applications\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AppAssetsForm
{
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Sliders')
                    ->description('Digunakan untuk Thema 2 bagian header (slide show)')
                    ->columnSpanFull()
                    ->aside()
                    ->schema([
                        Repeater::make('galleries')
                            ->label('Sliders')
                            ->hiddenLabel()
                            ->relationship('galleries')
                            ->columns()
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama')
                                    ->required()
                                    ->placeholder('Masukkan nama')
                                    ->columnSpanFull(),

                                Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->placeholder('Masukkan deskripsi')
                                    ->autosize()
                                    ->columnSpanFull(),

                                SpatieMediaLibraryFileUpload::make('slider')
                                    ->label('Gambar')
                                    ->disk('s3_public')
                                    ->collection('slider')
                                    ->visibility('public')
                                    ->image()
                                    ->openable()
                                    ->deletable()
                                    ->maxSize(600)
                                    ->required()
                                    ->helperText('Maksimal 600Kb dan disarankan 1440x775')
                                    ->columnSpanFull(),

                                TextInput::make('action_name')
                                    ->label('Nama Aksi')
                                    ->placeholder('Masukkan nama tombol aksi'),

                                TextInput::make('action_url')
                                    ->label('URL/Link Aksi')
                                    ->placeholder('Masukkan url tombol aksi'),
                            ])
                            ->mutateRelationshipDataBeforeSaveUsing(function (array $data): array {
                                $data['type'] = 'photo';

                                return $data;
                            })
                    ])
            ]);
    }
}