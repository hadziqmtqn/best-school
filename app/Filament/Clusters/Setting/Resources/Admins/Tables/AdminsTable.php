<?php

namespace App\Filament\Clusters\Setting\Resources\Admins\Tables;

use App\Enums\BaseRole;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class AdminsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                TextColumn::make('roles.name')
                    ->label('Peran')
                    ->searchable()
                    ->formatStateUsing(fn($state): string => BaseRole::tryFrom($state)?->getLabel() ?? $state),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('email_verified_at')
                    ->label('Email Terversifikasi')
                    ->isoDate('D MMM Y')
            ])
            ->deferFilters(false)
            ->filters([
                TrashedFilter::make()
                    ->native(false)
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make()
                        ->modalHeading('Ubah Data Admin'),

                    DeleteAction::make()
                        ->modalHeading('Hapus Data Admin')
                        ->visible(fn($record): bool => auth()->id() != $record->id)
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
