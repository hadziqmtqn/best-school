<?php

namespace App\Filament\Clusters\Reference\Resources\SchoolYears;

use App\Filament\Clusters\Reference\ReferenceCluster;
use App\Filament\Clusters\Reference\Resources\SchoolYears\Pages\ListSchoolYears;
use App\Filament\Clusters\Reference\Resources\SchoolYears\Schemas\SchoolYearForm;
use App\Filament\Clusters\Reference\Resources\SchoolYears\Tables\SchoolYearsTable;
use App\Models\SchoolYear;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use ToneGabes\Filament\Icons\Enums\Phosphor;

class SchoolYearResource extends Resource
{
    protected static ?string $model = SchoolYear::class;

    protected static ?string $cluster = ReferenceCluster::class;

    protected static string | BackedEnum | null $navigationIcon = Phosphor::CalendarCheck;

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Tahun Ajaran';

    protected static ?string $label = 'Tahun Ajaran';

    public static function form(Schema $schema): Schema
    {
        return SchoolYearForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SchoolYearsTable::configure($table);
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
            'index' => ListSchoolYears::route('/'),
        ];
    }
}
