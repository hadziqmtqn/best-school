<?php

namespace App\Filament\Clusters\Event\Resources\Announcements\Schemas;

use App\Enums\StatusData;
use App\Repositories\SchoolManagements\InstitutionRepository;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Schema;

class AannouncementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('institution_id')
                    ->label('Lembaga')
                    ->options(InstitutionRepository::options())
                    ->native(false),

                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->placeholder('Masukkan nama'),

                RichEditor::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->placeholder('Masukkan deskripsi')
                    ->fileAttachmentsDisk('s3_public')
                    ->fileAttachmentsAcceptedFileTypes(['image/*'])
                    ->fileAttachmentsDirectory('announcement')
                    ->columnSpanFull(),

                ToggleButtons::make('status')
                    ->label('Status')
                    ->options(StatusData::options())
                    ->required()
                    ->inline(),

                Radio::make('is_active')
                    ->label('Status Aktif')
                    ->boolean()
                    ->required()
                    ->inline()
            ]);
    }
}
