<?php

namespace App\Filament\Clusters\Setting\Resources\Applications\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SocialMediaForm
{
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->columns()
                    ->schema(self::components())
            ]);
    }

    private static function components(): array
    {
        $schemas = [];

        foreach (['facebook', 'instagram', 'threads', 'x'] as $item) {
            $schemas[] = TextInput::make('social_media.' . $item)
                ->label(ucfirst($item))
                ->url()
                ->placeholder('Masukkan URL Sosial Media');
        }
        
        return $schemas;
    }
}