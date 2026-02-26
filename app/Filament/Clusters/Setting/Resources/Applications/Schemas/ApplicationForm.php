<?php

namespace App\Filament\Clusters\Setting\Resources\Applications\Schemas;

use App\Utilities\ThemeColor;
use Filament\Forms\Components\Select;
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

                        Textarea::make('motto')
                            ->label('Motto')
                            ->placeholder('Masukkan motto singkat')
                            ->autosize()
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Masukkan deskripsi aplikasi')
                            ->autosize()
                            ->columnSpanFull(),

                        Select::make('theme_color')
                            ->label('Warna Tema')
                            ->helperText('Warna tema halaman beranda')
                            ->options(collect(ThemeColor::colors())
                                ->mapWithKeys(fn($theme) => [$theme['color'] => $theme['name']]))
                            ->required()
                            ->native(false),
                    ])
            ]);
    }
}
