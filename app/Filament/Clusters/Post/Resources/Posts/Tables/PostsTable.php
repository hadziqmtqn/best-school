<?php

namespace App\Filament\Clusters\Post\Resources\Posts\Tables;

use App\Enums\PostVisibility;
use App\Enums\StatusData;
use App\Filament\Clusters\Post\Resources\Posts\Filters\PostFilter;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns(self::columns())
            ->deferLoading()
            ->deferFilters(false)
            ->defaultSort('created_at', 'DESC')
            ->filters(PostFilter::schemas(), layout: FiltersLayout::Modal)
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                    RestoreAction::make(),
                    ForceDeleteAction::make()
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function columns(bool $isPost = true): array
    {
        return [
            TextColumn::make('title')
                ->label('Judul')
                ->limit(60)
                ->tooltip(fn($state): string => $state)
                ->searchable(),

            TextColumn::make('postCategory.name')
                ->label('Kategori')
                ->searchable()
                ->visible($isPost),

            TextColumn::make('user.name')
                ->label('Penulis')
                ->searchable(),

            TextColumn::make('status')
                ->label('Status')
                ->badge()
                ->color(fn($state): string => StatusData::tryFrom($state)?->getColor() ?? 'gray')
                ->formatStateUsing(fn($state): string => StatusData::tryFrom($state)?->getLabel() ?? $state)
                ->searchable()
                ->sortable(),

            TextColumn::make('visibility')
                ->label('Visibilitas')
                ->badge()
                ->color(fn($state): string => PostVisibility::tryFrom($state)?->getColor() ?? 'gray')
                ->formatStateUsing(fn($state): string => PostVisibility::tryFrom($state)?->getLabel() ?? $state)
                ->searchable()
                ->sortable(),

            TextColumn::make('reviewedBy.name')
                ->label('Ditinjau Oleh')
                ->toggleable()
                ->toggledHiddenByDefault(),

            TextColumn::make('created_at')
                ->label('Dibuat Pada')
                ->isoDateTime('D MMM Y HH:mm')
                ->toggleable()
                ->toggledHiddenByDefault(),
        ];
    }
}
