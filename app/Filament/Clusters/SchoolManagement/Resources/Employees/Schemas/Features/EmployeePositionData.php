<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features;

use App\Models\Institution;
use App\Models\PersonnelDepartment;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Utilities\Get;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class EmployeePositionData
{
    public static function schemas(array $institutionIds): array
    {
        return [
            Group::make()
                ->columnSpanFull()
                ->schema([
                    Select::make('institution_id')
                        ->label('Lembaga')
                        ->options(function () use ($institutionIds): array {
                            return Institution::query()
                                ->whereIn('id', $institutionIds)
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

                    Select::make('school_year_id')
                        ->label('Tahun Ajaran')
                        ->relationship(name: 'schoolYear')
                        ->getOptionLabelFromRecordUsing(fn(Model $record) => $record->year)
                        ->native(false),

                    FusedGroup::make([
                        DatePicker::make('start_date')
                            ->label('Periode Mulai')
                            ->date()
                            ->native(false)
                            ->required(fn(Get $get) => !is_null($get('end_date')))
                            ->placeholder('Masukkan periode mulai')
                            ->closeOnDateSelection()
                            ->reactive()
                            ->debounce()
                            ->afterStateUpdated(function ($state, callable $set, Get $get): void {
                                $endDate = $get('end_date');
                                if ($endDate) {
                                    $startDate = Carbon::parse($state);
                                    $endDate = Carbon::parse($endDate);

                                    if ($startDate->gt($endDate)) {
                                        $set('end_date', null);
                                    }
                                }
                            }),

                        DatePicker::make('end_date')
                            ->label('Periode Selesai')
                            ->date()
                            ->native(false)
                            ->required(fn(Get $get) => !is_null($get('start_date')))
                            ->minDate(fn(Get $get) => $get('start_date'))
                            ->placeholder('Masukkan periode selesai')
                            ->closeOnDateSelection()
                            ->reactive()
                            ->debounce(),
                    ])
                        ->label('Periode')
                        ->columns(),

                    Radio::make('is_active')
                        ->label('Aktifkan')
                        ->required()
                        ->boolean()
                        ->inline()
                ])
        ];
    }
}
