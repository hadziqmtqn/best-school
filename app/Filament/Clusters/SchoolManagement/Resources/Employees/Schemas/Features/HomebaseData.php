<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;

class HomebaseData
{
    public static function schema()
    {
        return Section::make('Unit Kerja')
            ->description('Unit kerja atau sekolah tempat pegawai terdaftar sebagai pegawai.')
            ->columnSpanFull()
            ->aside()
            ->schema([
                Repeater::make('homebases')
                    ->label('Unit Kerja')
                    ->hiddenLabel()
                    ->relationship('homebases')
                    ->maxItems(1)
                    ->defaultItems(0)
                    ->addActionLabel('Tambah Unit Kerja')
                    ->columns()
                    ->reactive()
                    ->schema([
                        Select::make('institution_id')
                            ->label('Lembaga')
                            ->relationship(name: 'institution', titleAttribute: 'name')
                            ->native(false)
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set, Get $get): void {
                                $employeePositions = $get('../../employeePositions');

                                if (! is_array($employeePositions)) {
                                    return;
                                }

                                foreach ($employeePositions as $index => $position) {
                                    $set("../../employeePositions." . $index . ".institution_id", null);
                                }
                            }),

                        DatePicker::make('appointment_date')
                            ->label('Terhitung Mulai Tanggal')
                            ->date()
                            ->native(false)
                            ->maxDate(now())
                            ->placeholder('Masukkan terhitung mulai tanggal')
                            ->closeOnDateSelection()
                    ])
                ->afterStateUpdated(function ($state, callable $set, Get $get): void {
                    $employeePositions = $get('employeePositions');

                    if ($employeePositions) {
                        $set('employeePositions', []);
                    }
                })
            ]);
    }
}