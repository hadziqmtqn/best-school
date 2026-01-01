<?php

namespace App\Filament\Clusters\Setting\Resources\Admins\Schemas;

use App\Enums\BaseRole;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AdminForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make()
                    ->columnSpanFull()
                    ->schema([
                        Tabs\Tab::make('Data Pribadi')
                            ->schema([
                                Select::make('roles')
                                    ->label('Peran')
                                    ->relationship(
                                        name: 'roles',
                                        titleAttribute: 'name'
                                    )
                                    ->getOptionLabelFromRecordUsing(fn (Model $record) => BaseRole::tryFrom($record->name)?->getLabel() ?? $record->name)
                                    ->required()
                                    ->preload()
                                    ->multiple()
                                    ->native(false)
                                    ->searchable(false)
                                    ->visible(fn(?User $user): bool => !($user && $user->hasRole('super_admin'))),

                                TextInput::make('name')
                                    ->label('Nama')
                                    ->required()
                                    ->placeholder('Masukkan nama lengkap'),

                                TextInput::make('email')
                                    ->label('Email')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->placeholder('Masukkan email'),

                                SpatieMediaLibraryFileUpload::make('avatar')
                                    ->label('Foto Profil')
                                    ->disk('s3')
                                    ->collection('avatar')
                                    ->visibility('private')
                                    ->acceptedFileTypes(['images/*'])
                                    ->maxSize(200)
                            ]),

                        Tabs\Tab::make('Keamanan')
                            ->schema([
                                TextInput::make('password')
                                    ->label('Kata Sandi')
                                    ->password()
                                    ->confirmed()
                                    ->minLength(8)
                                    ->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/')
                                    ->maxLength(20)
                                    ->autocomplete('new-password')
                                    ->dehydrated(fn (?string $state): bool => filled($state))
                                    ->required(fn (string $operation): bool => $operation === 'create')
                                    ->placeholder('Masukkan Kata Sandi Baru')
                                    ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null)
                                    ->revealable(),

                                TextInput::make('password_confirmation')
                                    ->label('Konfirmasi Kata Sandi')
                                    ->password()
                                    ->minLength(8)
                                    ->maxLength(20)
                                    ->autocomplete('new-password')
                                    ->dehydrated(fn (?string $state): bool => filled($state))
                                    ->required(fn (string $operation): bool => $operation === 'create')
                                    ->placeholder('Konfirmasi Kata Sandi Baru')
                                    ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null)
                                    ->revealable()
                            ])
                    ])
            ]);
    }
}
