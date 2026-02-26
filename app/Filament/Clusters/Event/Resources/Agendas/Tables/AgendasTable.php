<?php

namespace App\Filament\Clusters\Event\Resources\Agendas\Tables;

use App\Enums\StatusData;
use App\Models\Agenda;
use App\Repositories\SchoolManagements\InstitutionRepository;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
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
                    ->label('Validator')
                    ->searchable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),

                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->isoDateTime('D MMM Y HH:mm'),

                IconColumn::make('is_active')
                    ->label('Status Aktif')
                    ->boolean()
                    ->sortable()
            ])
            ->deferFilters(false)
            ->defaultSort('created_at', 'DESC')
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options(StatusData::options())
                    ->native(false),

                SelectFilter::make('institution_id')
                    ->label('Lembaga')
                    ->options(fn(InstitutionRepository $repository): array => $repository->options())
                    ->native(false),

                TrashedFilter::make()->native(false)
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make()
                        ->modalWidth('md')
                        ->mutateDataUsing(function (Agenda $agenda, array $data): array {
                            if ($data['status'] === StatusData::PUBLISHED->value) {
                                if (!$agenda->validated_by) {
                                    $data['validated_by'] = auth()->id();
                                }

                                $data['published_at'] = now();
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
