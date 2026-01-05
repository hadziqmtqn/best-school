<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Facilities;

use App\Filament\Clusters\SchoolManagement\Resources\Facilities\Pages\CreateFacility;
use App\Filament\Clusters\SchoolManagement\Resources\Facilities\Pages\EditFacility;
use App\Filament\Clusters\SchoolManagement\Resources\Facilities\Pages\ListFacilities;
use App\Filament\Clusters\SchoolManagement\Resources\Facilities\Schemas\FacilityForm;
use App\Filament\Clusters\SchoolManagement\Resources\Facilities\Tables\FacilitiesTable;
use App\Filament\Clusters\SchoolManagement\SchoolManagementCluster;
use App\Models\Facility;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FacilityResource extends Resource
{
    protected static ?string $model = Facility::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

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
            'create' => CreateFacility::route('/create'),
            'edit' => EditFacility::route('/{record}/edit'),
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
