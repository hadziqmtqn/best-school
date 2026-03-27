<?php

namespace App\Filament\Clusters\Reference\Resources\SchoolYears\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SchoolYearsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_year')
                    ->label('Tahun Awal')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('last_year')
                    ->label('Tahun Akhir')
                    ->searchable()
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('Status Aktif')
                    ->sortable()
                    ->boolean()
            ])
            ->defaultSort('first_year', 'DESC')
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make()
                        ->modalWidth('md'),

                    DeleteAction::make()
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
