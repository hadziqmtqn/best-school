<?php

namespace App\Filament\Clusters\Reference\Resources\SchoolYears\Schemas;

use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class SchoolYearForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->columnSpanFull()
                    ->schema([
                        Select::make('first_year')
                            ->label('Tahun Awal')
                            ->options(self::years())
                            ->required()
                            ->native(false),

                        Select::make('last_year')
                            ->label('Tahun Akhir')
                            ->options(self::years())
                            ->required()
                            ->native(false),

                        Radio::make('is_active')
                            ->label('Aktifkan')
                            ->required()
                            ->boolean()
                            ->inline()
                    ])
            ]);
    }

    private static function years(): array
    {
        return collect(range(2025, now()->addYears(5)->year))
            ->mapWithKeys(fn($item) => [$item => $item])
            ->toArray();
    }
}
