<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents\Tables;

use App\Models\NumberOfStudent;
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

class NumberOfStudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('employeePosition.schoolYear.year')
                    ->label('Tahun Ajaran'),

                TextColumn::make('employeePosition.institution.name')
                    ->label('Lembaga')
                    ->searchable(),

                TextColumn::make('employeePosition.user.name')
                    ->label('Nama Wali Kelas')
                    ->searchable(),

                TextColumn::make('classroom.name')
                    ->label('Kelas')
                    ->searchable(),

                TextColumn::make('rombel.name')
                    ->label('Rombel')
                    ->searchable(),

                TextColumn::make('amount')
                    ->label('Jumlah Siswa')
                    ->sortable()
            ])
            ->filters([
                TrashedFilter::make()->native(false)
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make()
                        ->modalWidth('md')
                        ->mutateRecordDataUsing(function (NumberOfStudent $numberOfStudent, array $data): array {
                            $data['school_year_id'] = $numberOfStudent->employeePosition?->school_year_id;
                            $data['institution_id'] = $numberOfStudent->employeePosition?->institution_id;
                            $data['personnel_department_id'] = $numberOfStudent->employeePosition?->personnel_department_id;

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
