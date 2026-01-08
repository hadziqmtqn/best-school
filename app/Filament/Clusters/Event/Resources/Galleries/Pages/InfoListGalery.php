<?php

namespace App\Filament\Clusters\Event\Resources\Galleries\Pages;

use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;

class InfoListGalery
{
    public static function components(): array
    {
        return [
            TextEntry::make('institution.name')
                ->label('Lembaga'),

            TextEntry::make('name')
                ->label('Nama'),

            TextEntry::make('description')
                ->label('Deskripsi')
                ->columnSpanFull(),

            TextEntry::make('youtube_id')
                ->label('Youtube')
                ->url(fn($state): string => 'https://www.youtube.com/watch?v=' . $state)
                ->openUrlInNewTab()
                ->visible(fn($record): bool => $record->type === 'video'),

            SpatieMediaLibraryImageEntry::make('image')
                ->collection('images')
                ->columnSpanFull()
                ->visible(fn($record): bool => $record->type === 'photo')
        ];
    }
}