<?php

namespace App\Filament\Clusters\Event\Resources\Agendas\Tables;

use App\Enums\StatusData;
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

class AgendasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('institution.name')
                    ->label('Lembaga')
                    ->searchable(),

                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                TextColumn::make('start_date')
                    ->label('Mulai')
                    ->isoDateTime('D MMM Y HH:mm')
                    ->sortable(),

                TextColumn::make('end_date')
                    ->label('Sampai')
                    ->isoDateTime('D MMM Y HH:mm')
                    ->sortable(),

                TextColumn::make('location')
                    ->label('Lokasi')
                    ->searchable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn($state): string => StatusData::tryFrom($state)?->getColor() ?? 'gray')
                    ->formatStateUsing(fn($state): string => StatusData::tryFrom($state)?->getLabel() ?? $state),

                TextColumn::make('user.name')
                    ->label('Penulis')
                    ->searchable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),

                TextColumn::make('validatedBy.name')
                    ->label('Divalidasi Oleh')
                    ->searchable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),

                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->isoDateTime('D MMM Y HH:mm')
            ])
            ->deferFilters(false)
            ->defaultSort('created_at', 'DESC')
            ->filters([
                TrashedFilter::make()->native(false)
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make()
                        ->modalWidth('md'),
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
