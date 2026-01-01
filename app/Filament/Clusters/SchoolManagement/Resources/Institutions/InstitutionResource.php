<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Institutions;

use App\Filament\Clusters\SchoolManagement\Resources\Institutions\Pages\CreateInstitution;
use App\Filament\Clusters\SchoolManagement\Resources\Institutions\Pages\EditInstitution;
use App\Filament\Clusters\SchoolManagement\Resources\Institutions\Pages\ListInstitutions;
use App\Filament\Clusters\SchoolManagement\Resources\Institutions\Schemas\InstitutionForm;
use App\Filament\Clusters\SchoolManagement\Resources\Institutions\Tables\InstitutionsTable;
use App\Filament\Clusters\SchoolManagement\SchoolManagementCluster;
use App\Models\Institution;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InstitutionResource extends Resource
{
    protected static ?string $model = Institution::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $cluster = SchoolManagementCluster::class;

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
            'index' => ListInstitutions::route('/'),
            'create' => CreateInstitution::route('/create'),
            'edit' => EditInstitution::route('/{record}/edit'),
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
