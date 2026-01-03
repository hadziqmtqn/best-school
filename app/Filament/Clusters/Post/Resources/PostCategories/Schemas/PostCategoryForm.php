<?php

namespace App\Filament\Clusters\Post\Resources\PostCategories\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class PostCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(self::schemas());
    }

    public static function schemas(): array
    {
        return [
            Group::make()
                ->columnSpanFull()
                ->schema([
                    TextInput::make('name')
                        ->label('Nama')
                        ->required()
                        ->placeholder('Masukkan nama'),

                    Textarea::make('description')
                        ->label('Deskripsi')
                        ->placeholder('Masukkan deskripsi')
                        ->autosize()
                        ->rows(3)
                ])
        ];
    }
}
