<?php

namespace App\Filament\Clusters\Reference\Resources\PersonnelDepartments\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class PersonnelDepartmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('level')
                    ->label('Level')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(40)
                    ->searchable()
            ])
            ->defaultSort('level')
            ->deferFilters(false)
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
                    //
                ]),
            ]);
    }
}
