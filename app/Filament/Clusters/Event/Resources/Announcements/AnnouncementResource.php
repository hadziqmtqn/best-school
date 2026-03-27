<?php

namespace App\Filament\Clusters\Event\Resources\Announcements;

use App\Filament\Clusters\Event\EventCluster;
use App\Filament\Clusters\Event\Resources\Announcements\Pages\ListAannouncements;
use App\Filament\Clusters\Event\Resources\Announcements\Schemas\AannouncementForm;
use App\Filament\Clusters\Event\Resources\Announcements\Tables\AannouncementsTable;
use App\Models\Announcement;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnnouncementResource extends Resource
{
    protected static ?string $model = Announcement::class;

    protected static ?string $label = 'Pengumuman';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $cluster = EventCluster::class;

    public static function form(Schema $schema): Schema
    {
        return AannouncementForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AannouncementsTable::configure($table);
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
            'index' => ListAannouncements::route('/'),
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
