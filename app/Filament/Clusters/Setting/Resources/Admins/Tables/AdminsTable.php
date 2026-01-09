<?php

namespace App\Filament\Clusters\Setting\Resources\Admins\Tables;

use App\Enums\BaseRole;
use App\Helpers\UserRole;
use App\Models\User;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
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
                    ->description(fn(User $user): string|null => $user->employeePositionActive?->personnelDepartment?->name)
                    ->searchable(),

                TextColumn::make('homebaseActive.institution.name')
                    ->label('Unit Kerja')
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
                    ->visible(UserRole::isSuperAdmin())
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make()
                        ->modalWidth('md')
                        ->visible(fn($record): bool => auth()->id() === $record->id || UserRole::isSuperAdmin()),

                    DeleteAction::make()
                        ->visible(fn($record): bool => !$record->employee && UserRole::isSuperAdmin() && auth()->id() != $record->id),

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
