<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\RelationManagers;

use App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features\EducationalHistoryData;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EducationalHistoriesRelationManager extends RelationManager
{
    protected static string $relationship = 'educationalHistories';

    protected static ?string $title = 'Riwayat Pendidikan';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components(EducationalHistoryData::schemas());
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('educationalLevel.full_name')
                    ->label('Jenjang')
                    ->searchable(),

                TextColumn::make('major')
                    ->label('Jurusan')
                    ->searchable(),

                TextColumn::make('institution_name')
                    ->label('Institusi')
                    ->searchable(),

                TextColumn::make('graduation_year')
                    ->label('Tahun Lulus')
                    ->searchable()
                    ->sortable(),
            ])
            ->defaultSort('graduation_year', 'DESC')
            ->deferFilters(false)
            ->filters([
                SelectFilter::make('educational_level_id')
                    ->label('Jenjang')
                    ->relationship(name: 'educationalLevel', titleAttribute: 'full_name')
                    ->searchable()
                    ->preload()
                    ->native(false),

                TrashedFilter::make()
                    ->native(false)
            ], layout: FiltersLayout::Modal)
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Baru')
                    ->modalHeading('Tambah riwayat pendidikan')
                    ->modalWidth('md')
                    ->visible(fn(): bool => $this->ownerRecord->is_active)
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make()
                        ->modalHeading('Ubah riwayat pendidikan')
                        ->modalWidth('md'),

                    DeleteAction::make()
                        ->modalHeading('Hapus riwayat pendidikan'),

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
