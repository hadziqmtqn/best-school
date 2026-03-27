<?php

namespace App\Filament\Clusters\Post\Resources\PostCategories\RelationManagers;

use App\Filament\Clusters\Post\Resources\Posts\PostResource;
use App\Filament\Clusters\Post\Resources\Posts\Tables\PostsTable;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostsRelationManager extends RelationManager
{
    protected static string $relationship = 'posts';

    public function table(Table $table): Table
    {
        return $table
            ->columns(PostsTable::columns())
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->button()
                    ->outlined()
                    ->url(fn($record): string => PostResource::getUrl('edit', ['record' => $record]))
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query
                ->withoutGlobalScopes([
                    SoftDeletingScope::class,
                ]));
    }
}
