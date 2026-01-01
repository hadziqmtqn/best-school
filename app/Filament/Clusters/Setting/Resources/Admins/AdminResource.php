<?php

namespace App\Filament\Clusters\Setting\Resources\Admins;

use App\Filament\Clusters\Setting\Resources\Admins\Pages\ListAdmins;
use App\Filament\Clusters\Setting\Resources\Admins\Schemas\AdminForm;
use App\Filament\Clusters\Setting\Resources\Admins\Tables\AdminsTable;
use App\Filament\Clusters\Setting\SettingCluster;
use App\Models\User;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $cluster = SettingCluster::class;

    public static function canAccess(): bool
    {
        return auth()->user()->can('ViewAnyAdmin');
    }

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationLabel = 'Admin';

    public static function form(Schema $schema): Schema
    {
        return AdminForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdminsTable::configure($table);
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
            'index' => ListAdmins::route('/'),
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
        return parent::getEloquentQuery();
    }
}
