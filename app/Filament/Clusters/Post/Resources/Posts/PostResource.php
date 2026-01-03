<?php

namespace App\Filament\Clusters\Post\Resources\Posts;

use App\Filament\Clusters\Post\PostCluster;
use App\Filament\Clusters\Post\Resources\Posts\Pages\CreatePost;
use App\Filament\Clusters\Post\Resources\Posts\Pages\EditPost;
use App\Filament\Clusters\Post\Resources\Posts\Pages\ListPosts;
use App\Filament\Clusters\Post\Resources\Posts\Pages\ViewPost;
use App\Filament\Clusters\Post\Resources\Posts\Schemas\PostForm;
use App\Filament\Clusters\Post\Resources\Posts\Tables\PostsTable;
use App\Models\Post;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $cluster = PostCluster::class;

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return PostForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PostsTable::configure($table);
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
            'index' => ListPosts::route('/'),
            'create' => CreatePost::route('/create'),
            'edit' => EditPost::route('/{record}/edit'),
            'view' => ViewPost::route('/{record}')
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
            ->with([
                'postCategory',
                'user',
                'reviewedBy'
            ]);
    }
}
