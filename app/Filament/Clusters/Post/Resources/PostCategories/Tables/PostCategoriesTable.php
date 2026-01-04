<?php

namespace App\Filament\Clusters\Post\Resources\PostCategories\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PostCategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->description(fn($record) => Str::limit($record->description))
                    ->wrap()
                    ->searchable(),

                TextColumn::make('posts_count')
                    ->label('Jumlah Post')
                    ->sortable()
                    ->suffix(' artikel')
            ])
            ->deferFilters(false)
            ->defaultSort('created_at', 'DESC')
            ->filters([
                TrashedFilter::make()
                    ->native(false)
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),

                    EditAction::make()
                        ->modalWidth('md'),

                    DeleteAction::make(),

                    RestoreAction::make(),

                    ForceDeleteAction::make()
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
