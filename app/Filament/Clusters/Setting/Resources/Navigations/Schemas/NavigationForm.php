<?php

namespace App\Filament\Clusters\Setting\Resources\Navigations\Schemas;

use App\Enums\NavigationCategory;
use App\Repositories\Posts\NavigationPageRepository;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use ToneGabes\Filament\Icons\Enums\Phosphor;

class NavigationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Navigasi Utama')
                    ->collapsible()
                    ->columnSpanFull()
                    ->schema([
                        Grid::make()
                            ->columns()
                            ->schema([
                                Radio::make('use_category')
                                    ->label('Navigasi Berkategori?')
                                    ->boolean()
                                    ->inline()
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function (callable $set): void {
                                        $set('category', []);
                                    })
                                    ->hintIcon(Phosphor::Info, 'Jika dipilih "Ya", URL navigasi akan dibuat otomatis dengan data dinamis (rekapan)'),

                                Select::make('category')
                                    ->label('Kategori')
                                    ->options(NavigationCategory::options())
                                    ->required()
                                    ->visible(fn(Get $get): bool => (bool) $get('use_category'))
                                    ->native(false)
                            ]),

                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->placeholder('Masukkan nama navigasi'),

                        TextInput::make('serial_number')
                            ->label('Nomor Urut')
                            ->numeric()
                            ->required()
                            ->placeholder('Masukkan nomor urut'),

                        Grid::make()
                            ->visible(fn(Get $get): bool => !$get('use_category'))
                            ->columnSpanFull()
                            ->schema(self::postSchemas())
                    ]),

                Section::make('Sub Navigasi')
                    ->collapsible()
                    ->columnSpanFull()
                    ->visible(fn(Get $get): bool => !$get('use_category'))
                    ->schema([
                        Repeater::make('subNavigations')
                            ->label('Sub Navigasi')
                            ->relationship('subNavigations')
                            ->hiddenLabel()
                            ->defaultItems(0)
                            ->schema([
                                Select::make('category')
                                    ->label('Kategori')
                                    ->options(NavigationCategory::options())
                                    ->native(false)
                                    ->reactive(),

                                TextInput::make('name')
                                    ->label('Nama')
                                    ->required()
                                    ->placeholder('Masukkan nama navigasi'),

                                TextInput::make('serial_number')
                                    ->label('Nomor Urut')
                                    ->numeric()
                                    ->required()
                                    ->placeholder('Masukkan nomor urut'),

                                Grid::make()
                                    ->visible(fn(Get $get): bool => !$get('category'))
                                    ->columnSpanFull()
                                    ->schema(self::postSchemas())
                            ])
                            ->mutateRelationshipDataBeforeSaveUsing(function (array $data): array {
                                if ($data['category']) {
                                    $data['post_id'] = null;
                                    $data['url'] = null;
                                }

                                return $data;
                            })
                    ]),
            ]);
    }

    private static function postSchemas(): array
    {
        return [
            Select::make('post_id')
                ->label('Laman')
                ->options(fn(NavigationPageRepository $repository): array => $repository->options())
                ->native(false)
                ->reactive()
                ->afterStateUpdated(function ($state, callable $set): void {
                    $set('url', null);
                }),

            TextInput::make('url')
                ->label('URL')
                ->placeholder('Masukkan URL tujuan')
                ->visible(fn(Get $get): bool => !$get('post_id'))
                ->reactive(),

            Radio::make('open_new_tab')
                ->label('Buka di Tab Baru?')
                ->boolean()
                ->inline()
                ->required(fn(Get $get): bool => (bool) $get('url'))
        ];
    }
}
