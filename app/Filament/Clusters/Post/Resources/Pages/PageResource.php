<?php

namespace App\Filament\Clusters\Post\Resources\Pages;

use App\Enums\PostType;
use App\Filament\Clusters\Post\PostCluster;
use App\Filament\Clusters\Post\Resources\Pages\Pages\CreatePage;
use App\Filament\Clusters\Post\Resources\Pages\Pages\EditPage;
use App\Filament\Clusters\Post\Resources\Pages\Pages\ListPages;
use App\Filament\Clusters\Post\Resources\Pages\Schemas\PageForm;
use App\Filament\Clusters\Post\Resources\Pages\Tables\PagesTable;
use App\Models\Post;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PageResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $cluster = PostCluster::class;

    protected static ?string $label = 'Laman';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return PageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PagesTable::configure($table);
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
            'index' => ListPages::route('/'),
            'create' => CreatePage::route('/create'),
            'edit' => EditPage::route('/{record}/edit'),
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
            ->with('institution')
            ->where('type', PostType::PAGE->value);
    }
}
