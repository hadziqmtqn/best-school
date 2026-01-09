<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\SchoolStatsOverviews\Schemas;

use App\Repositories\SchoolManagements\InstitutionRepository;
use App\Repositories\SchoolManagements\SchoolYearRepository;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class SchoolStartsOverviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->columnSpanFull()
                    ->schema([
                        Select::make('school_year_id')
                            ->label('Tahun Ajaran')
                            ->options(SchoolYearRepository::options())
                            ->required()
                            ->native(false),
                        
                        Select::make('institution_id')
                            ->label('Lembaga')
                            ->options(InstitutionRepository::options())
                            ->required()
                            ->native(false),

                        TextInput::make('number_of_teachers')
                            ->label('Jumlah GTK')
                            ->required()
                            ->numeric()
                            ->placeholder('Masukkan jumlah GTK'),

                        TextInput::make('number_of_students')
                            ->label('Jumlah Siswa')
                            ->required()
                            ->numeric()
                            ->placeholder('Masukkan jumlah siswa'),

                        TextInput::make('number_of_classrooms')
                            ->label('Jumlah Ruang Kelas')
                            ->required()
                            ->numeric()
                            ->placeholder('Masukkan jumlah ruang kelas'),
                    ])
            ]);
    }
}
