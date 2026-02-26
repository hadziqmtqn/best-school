<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Institutions\Schemas;

use App\Filament\GlobalSchemas\IdnLocationForm;
use App\Models\EducationalLevel;
use App\Repositories\References\EducationalLevelRepository;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class InstitutionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make()
                    ->columnSpanFull()
                    ->columns()
                    ->schema([
                        Tabs\Tab::make('Identitas Lembaga')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama')
                                    ->required()
                                    ->placeholder('Masukkan nama lembaga'),

                                Select::make('educational_level_id')
                                    ->label('Jenjang Pendidikan')
                                    ->options(function (EducationalLevelRepository $repository): array {
                                        return collect($repository->options())
                                            ->map(fn($item) => $item['fullName'])
                                            ->toArray();
                                    })
                                    ->required()
                                    ->native(false)
                                    ->exists(EducationalLevel::class, 'id'),

                                TextInput::make('npsn')
                                    ->label('NPSN')
                                    ->required()
                                    ->placeholder('Masukkan NPSN'),

                                Radio::make('status')
                                    ->label('Status')
                                    ->options(collect(['Negeri', 'Swasta'])->mapWithKeys(fn($item) => [$item => $item])->toArray())
                                    ->required()
                                    ->inline(),

                                TextInput::make('school_establishment_decree')
                                    ->label('SK Pendirian Sekolah')
                                    ->placeholder('Masukkan No. SK Pendirian Sekolah'),

                                DatePicker::make('date_establishment_decree')
                                    ->label('Tanggal SK Pendirian')
                                    ->placeholder('Masukkan tanggal SK Pendirian')
                                    ->native(false)
                                    ->closeOnDateSelection(),

                                TextInput::make('operational_permit_decree')
                                    ->label('SK Izin Operasional')
                                    ->placeholder('Masukkan No. SK Izin Operasional'),

                                DatePicker::make('date_operational_permit_decree')
                                    ->label('Tanggal SK Izin Operasional')
                                    ->placeholder('Masukkan tanggal SK Izin Operasional')
                                    ->native(false)
                                    ->closeOnDateSelection(),
                            ]),

                        Tabs\Tab::make('Profile')
                            ->schema([
                                RichEditor::make('profile')
                                    ->label('Profil Lembaga')
                                    ->fileAttachmentsDisk('s3_public')
                                    ->fileAttachmentsVisibility('public')
                                    ->fileAttachmentsDirectory('images')
                                    ->fileAttachmentsAcceptedFileTypes(['image/*'])
                                    ->placeholder('Masukkan profil lembaga')
                                    ->columnSpanFull()
                                    ->toolbarButtons([
                                        ['bold', 'italic', 'underline', 'link'],
                                        ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                                        ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                                        ['table', 'attachFiles'],
                                        ['undo', 'redo'],
                                    ])
                                    ->floatingToolbars([
                                        'table' => [
                                            'tableAddColumnBefore', 'tableAddColumnAfter', 'tableDeleteColumn',
                                            'tableAddRowBefore', 'tableAddRowAfter', 'tableDeleteRow',
                                            'tableMergeCells', 'tableSplitCell',
                                            'tableToggleHeaderRow', 'tableToggleHeaderCell',
                                            'tableDelete',
                                        ],
                                    ])
                            ]),

                        Tabs\Tab::make('Kontak')
                            ->schema([
                                TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->placeholder('Masukkan email'),

                                TextInput::make('phone_number')
                                    ->label('No. Telp')
                                    ->placeholder('Masukkan No. Telp'),

                                IdnLocationForm::province(),
                                IdnLocationForm::city(),
                                IdnLocationForm::district(),
                                IdnLocationForm::village(),
                                IdnLocationForm::street(),
                                IdnLocationForm::postalCode(),
                            ]),

                        Tabs\Tab::make('Media')
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('logo')
                                    ->label('Logo')
                                    ->disk('s3_public')
                                    ->collection('logo')
                                    ->visibility('public')
                                    ->acceptedFileTypes(['image/*'])
                                    ->maxSize(200)
                                    ->openable()
                            ])
                    ])
            ]);
    }
}
