<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents\Schemas;

use App\Repositories\References\PersonnelDepartmentRepository;
use App\Repositories\SchoolManagements\EmployeePositionRepository;
use App\Repositories\SchoolManagements\InstitutionRepository;
use App\Repositories\SchoolManagements\SchoolYearRepository;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class NumberOfStudentForm
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
                            ->options(InstitutionRepository::options())
                            ->required()
                            ->dehydrated(false)
                            ->native(false)
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set): void {
                                $set('employee_position_id', []);
                            }),

                        Select::make('school_year_id')
                            ->label('Tahun Ajaran')
                            ->options(SchoolYearRepository::options())
                            ->required()
                            ->dehydrated(false)
                            ->native(false)
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set): void {
                                $set('employee_position_id', []);
                            }),

                        Select::make('personnel_department_id')
                            ->label('Jabatan')
                            ->options(PersonnelDepartmentRepository::options())
                            ->required()
                            ->dehydrated(false)
                            ->native(false)
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set): void {
                                $set('employee_position_id', []);
                            }),

                        Select::make('employee_position_id')
                            ->label('Pegawai')
                            ->options(function (Get $get): array {
                                $schoolYearId = $get('school_year_id');
                                $institutionId = $get('institution_id');
                                $personnelDepartmentId = $get('personnel_department_id');

                                if (!$schoolYearId && !$institutionId && !$personnelDepartmentId) return [];

                                return collect(EmployeePositionRepository::options(
                                    schoolYearId: $schoolYearId,
                                    institutionId: $institutionId,
                                    personnelDepartmentId: $personnelDepartmentId
                                ))
                                    ->map(fn($item) => $item['employeeName'])
                                    ->toArray();
                            })
                            ->required()
                            ->native(false)
                            ->reactive(),

                        TextInput::make('amount')
                            ->label('Jumlah Siswa')
                            ->required()
                            ->numeric()
                            ->placeholder('Masukkan jumlah siswa')
                    ])
            ]);
    }
}
