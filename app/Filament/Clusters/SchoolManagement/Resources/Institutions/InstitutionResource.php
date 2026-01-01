<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Institutions;

use App\Filament\Clusters\SchoolManagement\Resources\Institutions\Pages\ListInstitutions;
use App\Filament\Clusters\SchoolManagement\Resources\Institutions\Schemas\InstitutionForm;
use App\Filament\Clusters\SchoolManagement\Resources\Institutions\Tables\InstitutionsTable;
use App\Filament\Clusters\SchoolManagement\SchoolManagementCluster;
use App\Models\Institution;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InstitutionResource extends Resource
{
    protected static ?string $model = Institution::class;

    protected static ?string $cluster = SchoolManagementCluster::class;

    protected static ?string $navigationLabel = 'Lembaga';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return InstitutionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InstitutionsTable::configure($table);
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
            'index' => ListInstitutions::route('/')
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
            ->with('educationalLevel');
    }
}
