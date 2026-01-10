<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\RelationManagers;

use App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features\HomebaseData;
use App\Helpers\UserRole;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HomebasesRelationManager extends RelationManager
{
    protected static string $relationship = 'homebases';

    protected static ?string $title = 'Unit Kerja';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components(HomebaseData::schemas());
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                TextColumn::make('institution.name')
                    ->label('Lembaga')
                    ->searchable(),

                TextColumn::make('appointment_date')
                    ->label('Tanggal Pengangkatan')
                    ->isoDate('D MMM Y'),

                IconColumn::make('is_active')
                    ->label('Status Aktif')
                    ->boolean()
                    ->sortable()
            ])
            ->deferFilters(false)
            ->filters([
                TrashedFilter::make()
                    ->native(false)
                    ->visible(UserRole::isSuperAdmin())
            ], layout: FiltersLayout::Modal)
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Unit Kerja')
                    ->modalHeading('Tambah Unit Kerja')
                    ->modalWidth('md')
                    ->visible(fn(): bool => $this->ownerRecord->is_active)
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make()
                        ->modalHeading('Ubah Unit Kerja')
                        ->modalWidth('md'),

                    DeleteAction::make()
                        ->modalHeading('Hapus Unit Kerja'),

                    ForceDeleteAction::make()
                        ->modalHeading('Hapus Selamanya'),

                    RestoreAction::make()
                        ->modalHeading('Pulihkan Data'),
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
