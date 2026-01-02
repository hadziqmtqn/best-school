<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Pribadi')
                    ->description('Informasi identitas dasar pegawai yang digunakan sebagai data utama.')
                    ->columnSpanFull()
                    ->columns()
                    ->aside()
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->placeholder('Masukkan nama lengkap'),

                        Group::make()
                            ->relationship('employee')
                            ->schema([
                                TextInput::make('place_of_birth')
                                    ->label('Tempat Lahir')
                                    ->placeholder('Masukkan tempat lahir')
                            ]),

                        Group::make()
                            ->relationship('employee')
                            ->schema([
                                DatePicker::make('date_of_birth')
                                    ->label('Tempat Lahir')
                                    ->date()
                                    ->placeholder('Masukkan tempat lahir')
                                    ->maxDate(now()->subYears(10))
                                    ->native(false)
                                    ->closeOnDateSelection()
                            ]),

                        Group::make()
                            ->relationship('employee')
                            ->schema([
                                Select::make('religion')
                                    ->label('Agama')
                                    ->options(
                                        collect(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Khonghuchu'])
                                            ->mapWithKeys(fn($item) => [$item => $item])
                                            ->toArray()
                                    )
                                    ->native(false)
                            ]),

                        TextInput::make('email')
                            ->label('Email')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('Masukkan Email valid')
                    ]),

                Section::make('Unit Kerja')
                    ->description('Unit kerja atau sekolah tempat pegawai terdaftar sebagai pegawai.')
                    ->columnSpanFull()
                    ->aside()
                    ->contained(false)
                    ->schema([
                        Repeater::make('homebases')
                            ->label('Unit Kerja')
                            ->hiddenLabel()
                            ->relationship('homebases')
                            ->minItems(1)
                            ->maxItems(1)
                            ->addable(false)
                            ->deletable(false)
                            ->columns()
                            ->schema([
                                Select::make('institution_id')
                                    ->label('Lembaga')
                                    ->relationship(name: 'institution', titleAttribute: 'name')
                                    ->native(false),

                                DatePicker::make('appointment_date')
                                    ->label('Terhitung Mulai Tanggal')
                                    ->date()
                                    ->native(false)
                                    ->maxDate(now())
                                    ->placeholder('Masukkan terhitung mulai tanggal')
                                    ->closeOnDateSelection()
                            ])
                    ]),

                Section::make('Jabatan Pegawai')
                    ->description('Informasi jabatan, peran, dan status kepegawaian pegawai.')
                    ->columnSpanFull()
                    ->aside(),

                Section::make('Riwayat Pendidikan')
                    ->description('Riwayat pendidikan formal pegawai yang mendukung kualifikasi jabatan.')
                    ->columnSpanFull()
                    ->aside(),
            ]);
    }
}
