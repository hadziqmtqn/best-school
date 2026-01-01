<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Institutions\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class InstitutionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                TextColumn::make('educationalLevel.full_name')
                    ->label('Jenjang')
                    ->searchable(),

                TextColumn::make('npsn')
                    ->label('NPSN')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('phone_number')
                    ->label('No. Telp.')
                    ->searchable()
            ])
            ->filters([
                TrashedFilter::make()
                    ->native(false),
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make()
                        ->modalHeading('Ubah Lembaga')
                        ->modalWidth('lg'),
                    DeleteAction::make()
                        ->modalHeading('Hapus Lembaga'),
                    RestoreAction::make()
                        ->modalHeading('Pulihkan Data'),
                    ForceDeleteAction::make()
                        ->modalHeading('Hapus Selamanya')
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
