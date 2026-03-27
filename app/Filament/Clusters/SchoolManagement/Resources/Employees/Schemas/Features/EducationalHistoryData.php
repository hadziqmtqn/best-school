<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features;

use App\Models\EducationalLevel;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;

class EducationalHistoryData
{
    public static function schemas(): array
    {
        return [
            Group::make()
                ->columnSpanFull()
                ->schema([
                    Select::make('educational_level_id')
                        ->label('Jenjang')
                        ->relationship(name: 'educationalLevel', titleAttribute: 'full_name')
                        ->required()
                        ->exists(EducationalLevel::class, 'id')
                        ->native(false)
                        ->searchable()
                        ->preload(),

                    TextInput::make('institution_name')
                        ->label('Lembaga')
                        ->required()
                        ->placeholder('Masukkan nama instansi'),

                    TextInput::make('major')
                        ->label('Jurusan')
                        ->placeholder('Masukkan nama jurusan'),

                    Select::make('graduation_year')
                        ->label('Tahun Lulus')
                        ->options(collect(range(1999, now()->year))->mapWithKeys(fn($item) => [$item => $item])->toArray())
                        ->required()
                        ->searchable()
                        ->native(false)
                ])
        ];
    }
}