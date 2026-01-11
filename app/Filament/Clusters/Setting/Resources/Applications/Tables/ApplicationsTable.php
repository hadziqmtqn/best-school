<?php

namespace App\Filament\Clusters\Setting\Resources\Applications\Tables;

use App\Enums\Theme;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama'),

                TextColumn::make('short_name')
                    ->label('Nama Singkatan'),

                TextColumn::make('theme')
                    ->formatStateUsing(fn($state): string => Theme::tryFrom($state)?->getLabel() ?? $state)
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->button()
                    ->outlined()
                    ->modalWidth('md')
            ])
            ->toolbarActions([
                BulkActionGroup::make([

                ]),
            ]);
    }
}
