<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Achievements;

use App\Filament\Clusters\SchoolManagement\Resources\Achievements\Pages\ListAchievements;
use App\Filament\Clusters\SchoolManagement\Resources\Achievements\Schemas\AchievementForm;
use App\Filament\Clusters\SchoolManagement\Resources\Achievements\Tables\AchievementsTable;
use App\Filament\Clusters\SchoolManagement\SchoolManagementCluster;
use App\Models\Achievement;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AchievementResource extends Resource
{
    protected static ?string $model = Achievement::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $cluster = SchoolManagementCluster::class;

    protected static ?string $label = 'Prestasi';

    public static function form(Schema $schema): Schema
    {
        return AchievementForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AchievementsTable::configure($table);
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
            'index' => ListAchievements::route('/'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with('institution');
    }
}
