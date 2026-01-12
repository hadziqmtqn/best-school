<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Achievements\Tables;

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

class AchievementsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('institution.name')
                    ->label('Lembaga')
                    ->searchable(),

                TextColumn::make('name')
                    ->label('Nama Prestasi')
                    ->searchable()
                    ->limit(50),

                TextColumn::make('contestant')
                    ->label('Peserta')
                    ->searchable(),

                TextColumn::make('organizer')
                    ->label('Penyelenggara')
                    ->searchable(),

                TextColumn::make('achievement_level')
                    ->label('Tingkat')
                    ->searchable(),

                TextColumn::make('year')
                    ->label('Tahun')
                    ->sortable()
                    ->searchable()
            ])
            ->deferFilters(false)
            ->defaultSort('year', 'DESC')
            ->filters([
                TrashedFilter::make()->native(false)
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make()->modalWidth('md'),
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
