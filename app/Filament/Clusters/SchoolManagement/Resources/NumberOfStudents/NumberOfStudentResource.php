<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents;

use App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents\Pages\CreateNumberOfStudent;
use App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents\Pages\EditNumberOfStudent;
use App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents\Pages\ListNumberOfStudents;
use App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents\Schemas\NumberOfStudentForm;
use App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents\Tables\NumberOfStudentsTable;
use App\Filament\Clusters\SchoolManagement\SchoolManagementCluster;
use App\Models\NumberOfStudent;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NumberOfStudentResource extends Resource
{
    protected static ?string $model = NumberOfStudent::class;

    protected static ?string $cluster = SchoolManagementCluster::class;

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
