<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features;

use App\Models\Institution;
use App\Models\PersonnelDepartment;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Illuminate\Database\Eloquent\Builder;

class EmployeePositionData
{
    public static function schema()
    {
        return Section::make('Jabatan Pegawai')
            ->description('Informasi jabatan, peran, dan status kepegawaian pegawai.')
            ->columnSpanFull()
            ->aside()
            ->columns()
            ->schema([
                Repeater::make('employeePositions')
                    ->label('Jabatan Pegawai')
                    ->relationship('employeePositions')
                    ->hiddenLabel()
                    ->maxItems(1)
                    ->defaultItems(0)
                    ->addActionLabel('Tambah Jabatan')
                    ->columns()
                    ->columnSpanFull()
                    ->schema([
                        Select::make('institution_id')
                            ->label('Lembaga')
                            ->options(function (Get $get): array {
                                $homebases = $get('../../homebases');

                                if (!$homebases) {
                                    return [];
                                }

                                $institutionId = [];

                                foreach ($homebases as $homebase) {
                                    $institutionId[] = $homebase['institution_id'];
                                }

                                return Institution::query()
                                    ->whereIn('id', $institutionId)
                                    ->get()
                                    ->mapWithKeys(fn(Institution $institution) => [$institution->id => $institution->name])
                                    ->toArray();
                            })
                            ->required()
                            ->reactive()
                            ->native(false),

                        Select::make('personnel_department_id')
                            ->label('Jabatan')
                            ->relationship(
                                name: 'personnelDepartment',
                                titleAttribute: 'name',
                                modifyQueryUsing: fn(Builder $query) => $query->orderBy('level')
                            )
                            ->exists(PersonnelDepartment::class, 'id')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->native(false),

                        Radio::make('is_active')
                            ->label('Aktifkan')
                            ->required()
                            ->boolean()
                            ->inline()
                    ])
            ]);
    }
}
