<?php

namespace App\Filament\Clusters\Setting\Resources\Applications\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MoreInfoForm
{
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Akreditasi')
                    ->columnSpanFull()
                    ->columns()
                    ->collapsible()
                    ->schema([
                        TextInput::make('more_info.accreditation_score')
                            ->label('Nilai Akreditasi')
                            ->placeholder('Nilai akreditasi lembaga'),

                        TextInput::make('more_info.accreditation_name')
                            ->label('Nama Akreditasi')
                            ->placeholder('Nama akreditasi lembaga'),
                    ]),

                Section::make('Call To Action (Utama)')
                    ->columnSpanFull()
                    ->collapsible()
                    ->columns()
                    ->schema([
                        TextInput::make('more_info.cta_title')
                            ->label('Judul Aksi')
                            ->placeholder('Masukkan judul aksi')
                            ->columnSpanFull(),

                        Textarea::make('more_info.cta_description')
                            ->label('Deskripsi')
                            ->placeholder('Masukkan deskripsi')
                            ->autosize()
                            ->columnSpanFull(),

                        TextInput::make('more_info.cta_url')
                            ->label('URL Aksi')
                            ->url()
                            ->placeholder('Masukkan URL tujuan'),

                        TextInput::make('more_info.cta_btn_label')
                            ->label('Label Tombol')
                            ->placeholder('Masukkan label tombol'),
                    ]),

                Section::make('Call To Action (Sidebar)')
                    ->columnSpanFull()
                    ->collapsible()
                    ->columns()
                    ->schema([
                        TextInput::make('more_info.cta_sidebar_title')
                            ->label('Judul Aksi')
                            ->placeholder('Masukkan judul aksi')
                            ->columnSpanFull(),

                        Textarea::make('more_info.cta_sidebar_description')
                            ->label('Deskripsi')
                            ->placeholder('Masukkan deskripsi')
                            ->autosize()
                            ->columnSpanFull(),

                        TextInput::make('more_info.cta_sidebar_url')
                            ->label('URL Aksi')
                            ->url()
                            ->placeholder('Masukkan URL tujuan'),

                        TextInput::make('more_info.cta_sidebar_btn_label')
                            ->label('Label Tombol')
                            ->placeholder('Masukkan label tombol'),
                    ]),
            ]);
    }
}
