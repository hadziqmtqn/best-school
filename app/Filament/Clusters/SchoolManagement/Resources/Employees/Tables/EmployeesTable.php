<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class EmployeesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                TextColumn::make('employee.nuptk')
                    ->label('NUPTK')
                    ->searchable(),

                TextColumn::make('employee.nip')
                    ->label('NIP')
                    ->searchable(),

                TextColumn::make('homebaseActive.institution.name')
                    ->label('Unit Kerja')
                    ->searchable(),

                TextColumn::make('employeePositionActive.personnelDepartment.name')
                    ->label('Jabatan')
                    ->searchable(),

                IconColumn::make('is_active')
                    ->label('Status Aktif')
                    ->boolean()
                    ->sortable(),
            ])
            ->deferFilters(false)
            ->deferLoading()
            ->defaultSort('name')
            ->filters([
                TrashedFilter::make()
                    ->native(false)
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
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
