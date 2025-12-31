<?php

namespace App\Filament\Clusters\Setting\Resources\Applications;

use App\Filament\Clusters\Setting\Resources\Applications\Pages\ListApplications;
use App\Filament\Clusters\Setting\Resources\Applications\Schemas\ApplicationForm;
use App\Filament\Clusters\Setting\Resources\Applications\Tables\ApplicationsTable;
use App\Filament\Clusters\Setting\SettingCluster;
use App\Models\Application;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;

    protected static ?string $cluster = SettingCluster::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationLabel = 'Aplikasi';

    public static function form(Schema $schema): Schema
    {
        return ApplicationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ApplicationsTable::configure($table);
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
            'index' => ListApplications::route('/'),
        ];
    }
}
