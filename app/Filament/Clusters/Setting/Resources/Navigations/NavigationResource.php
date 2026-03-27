<?php

namespace App\Filament\Clusters\Setting\Resources\Navigations;

use App\Filament\Clusters\Setting\Resources\Navigations\Pages\ListNavigations;
use App\Filament\Clusters\Setting\Resources\Navigations\Schemas\NavigationForm;
use App\Filament\Clusters\Setting\Resources\Navigations\Tables\NavigationsTable;
use App\Filament\Clusters\Setting\SettingCluster;
use App\Models\Navigation;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NavigationResource extends Resource
{
    protected static ?string $model = Navigation::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $cluster = SettingCluster::class;

    protected static ?string $label = 'Navigasi';

    public static function form(Schema $schema): Schema
    {
        return NavigationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NavigationsTable::configure($table);
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
            'index' => ListNavigations::route('/'),
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
            ->with('subNavigations')
            ->withCount('subNavigations');
    }
}
