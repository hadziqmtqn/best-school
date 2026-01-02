<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees;

use App\Filament\Clusters\SchoolManagement\Resources\Employees\Pages\CreateEmployee;
use App\Filament\Clusters\SchoolManagement\Resources\Employees\Pages\ListEmployees;
use App\Filament\Clusters\SchoolManagement\Resources\Employees\Pages\ViewEmployee;
use App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\EmployeeForm;
use App\Filament\Clusters\SchoolManagement\Resources\Employees\Tables\EmployeesTable;
use App\Filament\Clusters\SchoolManagement\SchoolManagementCluster;
use App\Helpers\CanAccess;
use App\Models\User;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $cluster = SchoolManagementCluster::class;

    protected static ?string $navigationLabel = 'Pegawai';

    protected static bool $shouldRegisterNavigation = false;

    public static function canAccess(): bool
    {
        return CanAccess::to('ViewAnyEmployee');
    }

    public static function form(Schema $schema): Schema
    {
        return EmployeeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EmployeesTable::configure($table);
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
            'index' => ListEmployees::route('/'),
            'create' => CreateEmployee::route('/create'),
            'view' => ViewEmployee::route('/{record}')
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
                'employee',
                'homebaseActive.institution',
                'homebases.institution',
                'employeePositions.personnelDepartment'
            ])
            ->whereHas('employee');
    }
}
