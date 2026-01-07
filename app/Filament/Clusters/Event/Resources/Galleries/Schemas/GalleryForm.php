<?php

namespace App\Filament\Clusters\Event\Resources\Galleries\Schemas;

use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class GalleryForm
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
                            ->native(false),

                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->placeholder('Masukkan nama'),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->autosize(),

                        Radio::make('type')
                            ->label('Jenis')
                            ->options([
                                'photo' => 'Foto',
                                'video' => 'Video'
                            ])
                            ->required()
                            ->inline()
                            ->reactive()
                            ->formatStateUsing(function ($state, callable $set): void {
                                if ($state === 'photo') {
                                    $set('images', null);
                                }

                                if ($state === 'video') {
                                    $set('youtube_id', null);
                                }
                            }),

                        SpatieMediaLibraryFileUpload::make('images')
                            ->label('Gambar')
                            ->disk('s3_public')
                            ->visibility('public')
                            ->collection('images')
                            ->multiple()
                            ->image()
                            ->maxSize(300)
                            ->required()
                            ->reactive()
                            ->visible(fn(Get $get): bool => $get('type') === 'photo'),

                        TextInput::make('youtube_id')
                            ->label('ID Youtube')
                            ->required()
                            ->visible(fn(Get $get): bool => $get('type') === 'video')
                    ])
            ]);
    }
}
