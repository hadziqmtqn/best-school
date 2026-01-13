<?php

namespace App\Filament\Clusters\Setting\Resources\Navigations\Tables;

use App\Enums\NavigationCategory;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class NavigationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category')
                    ->label('Kategori')
                    ->searchable()
                    ->formatStateUsing(fn($state): string => NavigationCategory::tryFrom($state)?->getLabel() ?? $state),

                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                TextColumn::make('serial_number')
                    ->label('Nomor Urut'),

                TextColumn::make('url')
                    ->label('URL')
                    ->url(fn($state): ?string => $state)
                    ->openUrlInNewTab(),

                TextColumn::make('sub_navigations_count')
                    ->label('Total Sub Navigasi')
                    ->sortable()
            ])
            ->deferFilters(false)
            ->defaultSort('serial_number')
            ->filters([
                TrashedFilter::make()->native(false),
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make()
                        ->slideOver()
                        ->modalWidth('lg')
                        ->mutateRecordDataUsing(function ($record, array $data): array {
                            $data['use_category'] = (bool) $record->category;

                            return $data;
                        })
                        ->mutateDataUsing(function (array $data): array {
                            if ($data['use_category']) {
                                $data['url'] = null;
                            }

                            if (!$data['use_category']) {
                                $data['category'] = null;
                            }

                            return $data;
                        }),

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
}
