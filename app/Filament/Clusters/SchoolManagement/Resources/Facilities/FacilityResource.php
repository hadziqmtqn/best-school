<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Facilities;

use App\Filament\Clusters\SchoolManagement\Resources\Facilities\Pages\ListFacilities;
use App\Filament\Clusters\SchoolManagement\Resources\Facilities\Schemas\FacilityForm;
use App\Filament\Clusters\SchoolManagement\Resources\Facilities\Tables\FacilitiesTable;
use App\Filament\Clusters\SchoolManagement\SchoolManagementCluster;
use App\Models\Facility;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FacilityResource extends Resource
{
    protected static ?string $model = Facility::class;

    protected static ?string $label = 'Fasilitas';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $cluster = SchoolManagementCluster::class;

    public static function form(Schema $schema): Schema
    {
        return FacilityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FacilitiesTable::configure($table);
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
            'index' => ListFacilities::route('/'),
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
