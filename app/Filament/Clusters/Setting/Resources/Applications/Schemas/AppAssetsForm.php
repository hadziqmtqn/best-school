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
                Section::make('Breadcrumb')
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
                            ->helperText('Maksimal 300Kb dan disarankan 1440x502')
                            ->columnSpanFull()
                    ]),

                Section::make('CTA')
                    ->aside()
                    ->columnSpanFull()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('cta')
                            ->label('CTA')
                            ->disk('s3_public')
                            ->collection('cta')
                            ->visibility('public')
                            ->image()
                            ->openable()
                            ->deletable()
                            ->maxSize(300)
                            ->helperText('Maksimal 300Kb dan disarankan 1170x344')
                            ->columnSpanFull()
                    ]),
            ]);
    }
}
