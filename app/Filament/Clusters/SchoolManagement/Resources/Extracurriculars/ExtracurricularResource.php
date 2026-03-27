<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Extracurriculars;

use App\Filament\Clusters\SchoolManagement\Resources\Extracurriculars\Pages\ListExtracurriculars;
use App\Filament\Clusters\SchoolManagement\Resources\Extracurriculars\Schemas\ExtracurricularForm;
use App\Filament\Clusters\SchoolManagement\Resources\Extracurriculars\Tables\ExtracurricularsTable;
use App\Filament\Clusters\SchoolManagement\SchoolManagementCluster;
use App\Models\Extracurricular;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExtracurricularResource extends Resource
{
    protected static ?string $model = Extracurricular::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $label = 'Ekstrakurikuler';

    protected static ?string $cluster = SchoolManagementCluster::class;

    public static function form(Schema $schema): Schema
    {
        return ExtracurricularForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExtracurricularsTable::configure($table);
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
            'index' => ListExtracurriculars::route('/'),
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
