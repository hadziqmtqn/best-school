<?php

namespace App\Filament\Clusters\Event\Resources\Galleries\Tables;

use App\Models\Gallery;
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
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class GalleriesTable
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

                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit()
                    ->searchable(),

                TextColumn::make('type')
                    ->label('Jenis')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(fn($state): string => ucfirst($state)),

                TextColumn::make('youtube_id')
                    ->label('ID Youtube')
                    ->url(fn($state): string => 'https://www.youtube.com/watch?v=' . $state)
                    ->openUrlInNewTab()
            ])
            ->deferFilters(false)
            ->defaultSort('created_at', 'DESC')
            ->filters([
                SelectFilter::make('institution_id')
                    ->label('Lembaga')
                    ->options(InstitutionRepository::options())
                    ->native(false),

                TrashedFilter::make()->native(false)
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),

                    EditAction::make()
                        ->modalWidth('md')
                        ->slideOver()
                        ->mutateDataUsing(function (array $data): array {
                            if ($data['type'] === 'photo') {
                                $data['youtube_id'] = null;
                            }

                            return $data;
                        })
                        ->after(function (Gallery $gallery): void {
                            if ($gallery->type === 'video' && $gallery->hasMedia('images')) {
                                $gallery->clearMediaCollection('images');
                            }
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
