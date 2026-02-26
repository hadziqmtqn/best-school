<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Achievements\Schemas;

use App\Repositories\References\SelectAchievementLevelRepository;
use App\Repositories\SchoolManagements\InstitutionRepository;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class AchievementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->columnSpanFull()
                    ->schema([
                        Select::make('institution_id')
                            ->label('Lembaga')
                            ->options(fn(InstitutionRepository $repository): array => $repository->options())
                            ->required()
                            ->native(false),

                        TextInput::make('name')
                            ->label('Nama Prestasi')
                            ->required()
                            ->placeholder('Masukkan nama prestasi'),

                        TextInput::make('contestant')
                            ->label('Peserta')
                            ->required()
                            ->placeholder('Masukkan nama peserta'),

                        TextInput::make('organizer')
                            ->label('Penyelenggara')
                            ->required()
                            ->placeholder('Masukkan nama penyelenggara'),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Masukkan deskripsi')
                            ->autosize(),

                        Select::make('achievement_level')
                            ->label('Tingkat')
                            ->options(fn(SelectAchievementLevelRepository $repository): array => $repository->option())
                            ->required()
                            ->native(false),

                        SpatieMediaLibraryFileUpload::make('certificate')
                            ->label('Sertifikat')
                            ->disk('s3_public')
                            ->visibility('public')
                            ->collection('certificate')
                            ->acceptedFileTypes(['image.*', 'application/pdf'])
                            ->maxSize('500')
                            ->openable()
                            ->deletable()
                    ])
            ]);
    }
}
