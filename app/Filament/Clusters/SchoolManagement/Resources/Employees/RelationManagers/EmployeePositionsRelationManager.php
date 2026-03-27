<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\RelationManagers;

use App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features\EmployeePositionData;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeePositionsRelationManager extends RelationManager
{
    protected static string $relationship = 'employeePositions';

    protected static ?string $title = 'Jabatan Pegawai';

    public function form(Schema $schema): Schema
    {
        $record = $this->getOwnerRecord();

        return $schema
            ->components(EmployeePositionData::schemas(
                institutionIds: $record->homebases->isNotEmpty() ? $record->homebases->pluck('institution_id')->toArray() : [])
            );
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('personnelDepartment.name')
                    ->label('Jabatan')
                    ->searchable(),

                TextColumn::make('schoolYear.year')
                    ->label('Tahun Ajaran'),

                TextColumn::make('period')
                    ->label('Periode'),

                IconColumn::make('is_active')
                    ->label('Status Aktif')
                    ->boolean()
            ])
            ->deferFilters(false)
            ->filters([
                TrashedFilter::make()
                    ->native(false)
            ], layout: FiltersLayout::Modal)
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Baru')
                    ->modalHeading('Tambah Jabatan')
                    ->modalWidth('md')
                    ->visible(fn(): bool => $this->ownerRecord->is_active)
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make()
                        ->modalHeading('Ubah Jabatan')
                        ->modalWidth('md'),

                    DeleteAction::make()
                        ->modalHeading('Hapus Jabatan'),

                    ForceDeleteAction::make()
                        ->modalHeading('Hapus Selamanya'),

                    RestoreAction::make()
                        ->modalHeading('Pulihkan Data')
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query
                ->withoutGlobalScopes([
                    SoftDeletingScope::class,
                ]));
    }
}
