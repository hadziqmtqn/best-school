<?php

namespace App\Filament\Clusters\Reference\Resources\PersonnelDepartments;

use App\Filament\Clusters\Reference\ReferenceCluster;
use App\Filament\Clusters\Reference\Resources\PersonnelDepartments\Pages\ListPersonnelDepartments;
use App\Filament\Clusters\Reference\Resources\PersonnelDepartments\Schemas\PersonnelDepartmentForm;
use App\Filament\Clusters\Reference\Resources\PersonnelDepartments\Tables\PersonnelDepartmentsTable;
use App\Models\PersonnelDepartment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use ToneGabes\Filament\Icons\Enums\Phosphor;

class PersonnelDepartmentResource extends Resource
{
    protected static ?string $model = PersonnelDepartment::class;

    protected static ?string $cluster = ReferenceCluster::class;

    protected static ?int $navigationSort = 1;

    protected static string | BackedEnum | null $navigationIcon = Phosphor::GitBranch;

    protected static ?string $navigationLabel = 'Jabatan Pegawai';

    protected static ?string $label = 'Jabatan Pegawai';

    public static function form(Schema $schema): Schema
    {
        return PersonnelDepartmentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PersonnelDepartmentsTable::configure($table);
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
            'index' => ListPersonnelDepartments::route('/'),
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
