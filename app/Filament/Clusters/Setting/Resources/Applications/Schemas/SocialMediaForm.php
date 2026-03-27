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

        foreach (self::socialMedias() as $key => $item) {
            $schemas[] = TextInput::make('social_media.' . $key)
                ->label($item)
                ->url()
                ->placeholder('Masukkan URL profil ' . $item);
        }

        return $schemas;
    }

    private static function socialMedias(): array
    {
        return [
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'threads' => 'Threads',
            'x' => 'X (Twitter)'
        ];
    }
}
