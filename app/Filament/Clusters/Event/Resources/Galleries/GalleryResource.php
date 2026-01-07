<?php

namespace App\Filament\Clusters\Event\Resources\Galleries;

use App\Filament\Clusters\Event\EventCluster;
use App\Filament\Clusters\Event\Resources\Galleries\Pages\ListGalleries;
use App\Filament\Clusters\Event\Resources\Galleries\Schemas\GalleryForm;
use App\Filament\Clusters\Event\Resources\Galleries\Tables\GalleriesTable;
use App\Models\Gallery;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $label = 'Galeri';

    protected static ?string $cluster = EventCluster::class;

    public static function form(Schema $schema): Schema
    {
        return GalleryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GalleriesTable::configure($table);
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
            'index' => ListGalleries::route('/'),
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
