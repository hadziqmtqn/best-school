<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\EmployeePositions\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class EmployeePositionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('personnelDepartment.name')
                    ->label('Jabatan')
                    ->searchable(),

                TextColumn::make('institution.name')
                    ->label('Lembaga')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('user.name')
                    ->label('Nama Pegawai')
                    ->searchable(),

                TextColumn::make('schoolYear.year')
                    ->label('Tahun Ajaran')
            ])
            ->deferLoading()
            ->deferFilters(false)
            ->filters([
                TrashedFilter::make()->native(false),
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make(),
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
