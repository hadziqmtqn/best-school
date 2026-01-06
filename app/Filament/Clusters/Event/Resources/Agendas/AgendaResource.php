<?php

namespace App\Filament\Clusters\Event\Resources\Agendas;

use App\Filament\Clusters\Event\EventCluster;
use App\Filament\Clusters\Event\Resources\Agendas\Pages\ListAgendas;
use App\Filament\Clusters\Event\Resources\Agendas\Schemas\AgendaForm;
use App\Filament\Clusters\Event\Resources\Agendas\Tables\AgendasTable;
use App\Models\Agenda;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;

    protected static ?string $cluster = EventCluster::class;

    protected static ?string $label = 'Agenda';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return AgendaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AgendasTable::configure($table);
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
            'index' => ListAgendas::route('/'),
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
            ->with(['user', 'institution', 'validatedBy']);
    }
}
