<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\SchoolStatsOverviews\Tables;

use App\Repositories\SchoolManagements\InstitutionRepository;
use App\Repositories\SchoolManagements\SchoolYearRepository;
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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class SchoolStartsOverviewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('schoolYear.year')
                    ->label('Tahun Ajaran'),
                
                TextColumn::make('institution.name')
                    ->label('Lembaga')
                    ->searchable(),

                TextColumn::make('number_of_teachers')
                    ->label('Jumlah GTK')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('number_of_students')
                    ->label('Jumlah Siswa')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('number_of_classrooms')
                    ->label('Jumlah Ruang Kelas')
                    ->searchable()
                    ->sortable(),
            ])
            ->deferFilters(false)
            ->defaultSort('school_year_id', 'DESC')
            ->filters([
                SelectFilter::make('school_year_id')
                    ->label('Tahun Ajaran')
                    ->options(SchoolYearRepository::options())
                    ->native(false),

                SelectFilter::make('institution_id')
                    ->label('Lembaga')
                    ->options(InstitutionRepository::options())
                    ->native(false),

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
