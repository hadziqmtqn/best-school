<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents;

use App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents\Pages\ListNumberOfStudents;
use App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents\Schemas\NumberOfStudentForm;
use App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents\Tables\NumberOfStudentsTable;
use App\Filament\Clusters\SchoolManagement\SchoolManagementCluster;
use App\Models\NumberOfStudent;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NumberOfStudentResource extends Resource
{
    protected static ?string $model = NumberOfStudent::class;

    protected static ?string $cluster = SchoolManagementCluster::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $label = 'Jumlah Siswa';

    public static function form(Schema $schema): Schema
    {
        return NumberOfStudentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NumberOfStudentsTable::configure($table);
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
            'index' => ListNumberOfStudents::route('/'),
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
