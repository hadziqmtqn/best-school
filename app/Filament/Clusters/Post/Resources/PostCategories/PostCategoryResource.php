<?php

namespace App\Filament\Clusters\Post\Resources\PostCategories;

use App\Filament\Clusters\Post\PostCluster;
use App\Filament\Clusters\Post\Resources\PostCategories\Pages\ListPostCategories;
use App\Filament\Clusters\Post\Resources\PostCategories\Pages\ViewPostCategory;
use App\Filament\Clusters\Post\Resources\PostCategories\Schemas\PostCategoryForm;
use App\Filament\Clusters\Post\Resources\PostCategories\Tables\PostCategoriesTable;
use App\Models\PostCategory;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostCategoryResource extends Resource
{
    protected static ?string $model = PostCategory::class;

    protected static ?string $cluster = PostCluster::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationLabel = 'Kategori Post';

    protected static ?string $label = 'Kategori Post';

    public static function form(Schema $schema): Schema
    {
        return PostCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PostCategoriesTable::configure($table);
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
            'index' => ListPostCategories::route('/'),
            'view' => ViewPostCategory::route('/{record}')
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
