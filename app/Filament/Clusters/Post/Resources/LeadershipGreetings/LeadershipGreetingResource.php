<?php

namespace App\Filament\Clusters\Post\Resources\LeadershipGreetings;

use App\Filament\Clusters\Post\PostCluster;
use App\Filament\Clusters\Post\Resources\LeadershipGreetings\Pages\ListLeadershipGreetings;
use App\Filament\Clusters\Post\Resources\LeadershipGreetings\Schemas\LeadershipGreetingForm;
use App\Filament\Clusters\Post\Resources\LeadershipGreetings\Tables\LeadershipGreetingsTable;
use App\Models\LeadershipGreeting;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class LeadershipGreetingResource extends Resource
{
    protected static ?string $model = LeadershipGreeting::class;

    protected static ?string $cluster = PostCluster::class;

    protected static ?string $label = 'Sambutan Pimpinan';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return LeadershipGreetingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LeadershipGreetingsTable::configure($table);
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
            'index' => ListLeadershipGreetings::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with('user');
    }
}
