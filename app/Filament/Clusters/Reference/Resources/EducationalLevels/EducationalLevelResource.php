<?php

namespace App\Filament\Clusters\Reference\Resources\EducationalLevels;

use App\Filament\Clusters\Reference\ReferenceCluster;
use App\Filament\Clusters\Reference\Resources\EducationalLevels\Pages\CreateEducationalLevel;
use App\Filament\Clusters\Reference\Resources\EducationalLevels\Pages\EditEducationalLevel;
use App\Filament\Clusters\Reference\Resources\EducationalLevels\Pages\ListEducationalLevels;
use App\Filament\Clusters\Reference\Resources\EducationalLevels\Schemas\EducationalLevelForm;
use App\Filament\Clusters\Reference\Resources\EducationalLevels\Tables\EducationalLevelsTable;
use App\Models\EducationalLevel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EducationalLevelResource extends Resource
{
    protected static ?string $model = EducationalLevel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $cluster = ReferenceCluster::class;

    public static function form(Schema $schema): Schema
    {
        return EducationalLevelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EducationalLevelsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEducationalLevels::route('/'),
            'create' => CreateEducationalLevel::route('/create'),
            'edit' => EditEducationalLevel::route('/{record}/edit'),
        ];
    }
}
