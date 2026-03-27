<?php

namespace App\Filament\Clusters\Post\Resources\LeadershipGreetings\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class LeadershipGreetingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('Pimpinan')
                    ->relationship(
                        name: 'user',
                        titleAttribute: 'name',
                        modifyQueryUsing: function (Builder $query): Builder {
                            return $query->whereHas('employeePositionActive.personnelDepartment', fn($query) => $query->where('level', 1));
                        }
                    )
                    ->native(false),

                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->default('Sambutan Pimpinan')
                    ->placeholder('Masukkan judul sambutan'),

                RichEditor::make('message')
                    ->label('Konten')
                    ->required()
                    ->columnSpanFull()
                    ->placeholder('Masukkan pesan sambutan')
                    ->toolbarButtons([
                        ['bold', 'italic', 'underline', 'link'],
                        ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                        ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                        ['undo', 'redo'],
                    ])
            ]);
    }
}
