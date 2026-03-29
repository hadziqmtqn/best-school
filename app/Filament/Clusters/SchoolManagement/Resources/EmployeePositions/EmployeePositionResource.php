<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\EmployeePositions;

use App\Filament\Clusters\SchoolManagement\Resources\EmployeePositions\Pages\ListEmployeePositions;
use App\Filament\Clusters\SchoolManagement\Resources\EmployeePositions\Schemas\EmployeePositionForm;
use App\Filament\Clusters\SchoolManagement\Resources\EmployeePositions\Tables\EmployeePositionsTable;
use App\Filament\Clusters\SchoolManagement\SchoolManagementCluster;
use App\Models\EmployeePosition;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeePositionResource extends Resource
{
    protected static ?string $model = EmployeePosition::class;

    protected static ?string $cluster = SchoolManagementCluster::class;

    protected static ?string $label = 'Jabatan Pegawai';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return EmployeePositionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EmployeePositionsTable::configure($table);
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
            'index' => ListEmployeePositions::route('/'),
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
            ->with([
                'user',
                'personnelDepartment',
                'institution',
                'schoolYear'
            ]);
    }
}
