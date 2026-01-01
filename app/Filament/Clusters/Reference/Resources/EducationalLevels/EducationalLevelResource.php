<?php

namespace App\Filament\Clusters\Reference\Resources\EducationalLevels;

use App\Filament\Clusters\Reference\ReferenceCluster;
use App\Filament\Clusters\Reference\Resources\EducationalLevels\Pages\ListEducationalLevels;
use App\Filament\Clusters\Reference\Resources\EducationalLevels\Schemas\EducationalLevelForm;
use App\Filament\Clusters\Reference\Resources\EducationalLevels\Tables\EducationalLevelsTable;
use App\Models\EducationalLevel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use ToneGabes\Filament\Icons\Enums\Phosphor;

class EducationalLevelResource extends Resource
{
    protected static ?string $model = EducationalLevel::class;

    protected static string|BackedEnum|null $navigationIcon = Phosphor::ChartLine;

    protected static ?string $cluster = ReferenceCluster::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Jenjang Pendidikan';

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
        ];
    }
}
