<?php

namespace App\Filament\Clusters\Setting\Resources\Applications\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AppAssetsForm
{
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Logo')
                    ->description('Logo aplikasi dan favicon')
                    ->aside()
                    ->columnSpanFull()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('logo')
                            ->label('Logo')
                            ->disk('s3_public')
                            ->collection('logo')
                            ->visibility('public')
                            ->image()
                            ->maxSize(100)
                            ->openable()
                            ->helperText('Ukuran gambar maksimal 100Kb'),
                    ]),

                Section::make('Banner Image')
                    ->description('Gambar utama di halaman beranda')
                    ->aside()
                    ->columnSpanFull()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('banner')
                            ->label('Banner Image')
                            ->disk('s3_public')
                            ->collection('banner')
                            ->visibility('public')
                            ->image()
                            ->openable()
                            ->deletable()
                            ->maxSize(200)
                            ->helperText('Maksimal 300Kb dan disarankan 1301x778 px')
                    ]),

                Section::make('Breadcrumb')
                    ->description('Gambar latar belakang pada detail berita & media di halaman beranda')
                    ->aside()
                    ->columnSpanFull()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('breadcrumb')
                            ->label('Breadcrumb')
                            ->disk('s3_public')
                            ->collection('breadcrumb')
                            ->visibility('public')
                            ->image()
                            ->openable()
                            ->deletable()
                            ->maxSize(300)
                            ->helperText('Maksimal 300Kb dan disarankan 1440x502 px')
                    ]),
            ]);
    }
}
