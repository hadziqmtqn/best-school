<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\SchoolStatsOverviews;

use App\Filament\Clusters\SchoolManagement\Resources\SchoolStatsOverviews\Pages\ListSchoolStartsOverviews;
use App\Filament\Clusters\SchoolManagement\Resources\SchoolStatsOverviews\Schemas\SchoolStartsOverviewForm;
use App\Filament\Clusters\SchoolManagement\Resources\SchoolStatsOverviews\Tables\SchoolStartsOverviewsTable;
use App\Filament\Clusters\SchoolManagement\SchoolManagementCluster;
use App\Models\SchoolStatsOverview;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SchoolStatsOverviewResource extends Resource
{
    protected static ?string $model = SchoolStatsOverview::class;

    protected static ?string $cluster = SchoolManagementCluster::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $label = 'Statistik Sekolah';

    public static function form(Schema $schema): Schema
    {
        return SchoolStartsOverviewForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SchoolStartsOverviewsTable::configure($table);
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
            'index' => ListSchoolStartsOverviews::route('/'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
