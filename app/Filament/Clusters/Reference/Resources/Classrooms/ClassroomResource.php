<?php

namespace App\Filament\Clusters\Reference\Resources\Classrooms;

use App\Filament\Clusters\Reference\ReferenceCluster;
use App\Filament\Clusters\Reference\Resources\Classrooms\Pages\ListClassrooms;
use App\Filament\Clusters\Reference\Resources\Classrooms\Schemas\ClassroomForm;
use App\Filament\Clusters\Reference\Resources\Classrooms\Tables\ClassroomsTable;
use App\Models\Classroom;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use ToneGabes\Filament\Icons\Enums\Phosphor;

class ClassroomResource extends Resource
{
    protected static ?string $model = Classroom::class;

    protected static string|BackedEnum|null $navigationIcon = Phosphor::BuildingApartment;

    protected static ?string $cluster = ReferenceCluster::class;

    protected static ?int $navigationSort = 4;

    protected static ?string $label = 'Ruang Kelas';

    public static function form(Schema $schema): Schema
    {
        return ClassroomForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClassroomsTable::configure($table);
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
            'index' => ListClassrooms::route('/'),
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
