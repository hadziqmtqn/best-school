<?php

namespace App\Filament\Clusters\Post\Resources\Posts\Schemas;

use App\Filament\Clusters\Post\Resources\PostCategories\Schemas\PostCategoryForm;
use App\Models\PostCategory;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Group::make()
                    ->columnSpan(['lg' => 2])
                    ->schema([
                        Section::make()
                            ->schema([
                                TextInput::make('title')
                                    ->label('Judul')
                                    ->required()
                                    ->placeholder('Masukkan judul'),

                                RichEditor::make('content')
                                    ->label('Konten')
                                    ->required()
                                    ->fileAttachmentsDisk('s3_public')
                                    ->fileAttachmentsVisibility('public')
                                    ->fileAttachmentsDirectory('post_media')
                                    ->fileAttachmentsAcceptedFileTypes(['image/*'])
                                    ->placeholder('Masukkan konten')
                                    ->toolbarButtons([
                                        ['bold', 'italic', 'underline', 'link'],
                                        ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                                        ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                                        ['table', 'attachFiles'],
                                        ['undo', 'redo'],
                                    ])
                                    ->floatingToolbars([
                                        'paragraph' => [
                                            'bold', 'italic', 'underline', 'bulletList', 'orderedList'
                                        ],
                                        'heading' => [
                                            'h1', 'h2', 'h3',
                                        ],
                                        'table' => [
                                            'tableAddColumnBefore', 'tableAddColumnAfter', 'tableDeleteColumn',
                                            'tableAddRowBefore', 'tableAddRowAfter', 'tableDeleteRow',
                                            'tableMergeCells', 'tableSplitCell',
                                            'tableToggleHeaderRow', 'tableToggleHeaderCell',
                                            'tableDelete',
                                        ],
                                    ])
                            ])
                    ]),

                Group::make()
                    ->columnSpan(['lg' => 1])
                    ->schema([
                        Section::make()
                            ->schema([
                                Select::make('post_category_id')
                                    ->label('Kategori')
                                    ->relationship(
                                        name: 'postCategory',
                                        titleAttribute: 'name',
                                        modifyQueryUsing: fn (Builder $query) => $query->where('is_active', true)
                                    )
                                    ->native(false)
                                    ->preload()
                                    ->searchable()
                                    ->createOptionForm(PostCategoryForm::schemas())
                                    ->createOptionModalHeading('Tambah Kategori')
                                    ->createOptionUsing(function (array $data): int {
                                        return PostCategory::create($data)->getKey();
                                    }),

                                TagsInput::make('tags')
                                    ->label('Tag')
                                    ->placeholder('Masukkan tag')
                                    ->splitKeys(['Tab', ' '])
                            ]),

                        Section::make('Thumbnail')
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('thumbnail')
                                    ->hiddenLabel()
                                    ->disk('s3_public')
                                    ->visibility('public')
                                    ->image()
                                    ->maxSize(500)
                                    ->openable()
                            ])
                    ]),
            ]);
    }
}
