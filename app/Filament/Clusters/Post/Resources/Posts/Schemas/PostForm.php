<?php

namespace App\Filament\Clusters\Post\Resources\Posts\Schemas;

use App\Enums\PostVisibility;
use App\Enums\StatusData;
use App\Filament\Clusters\Post\Resources\PostCategories\Schemas\PostCategoryForm;
use App\Helpers\UserRole;
use App\Models\PostCategory;
use App\Repositories\SchoolManagements\InstitutionRepository;
use Filament\Actions\Action;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use ToneGabes\Filament\Icons\Enums\Phosphor;

class PostForm
{
    public static function configure(
        Schema $schema,
        bool $useCategory = true,
        bool $useTag = true,
        bool $useAllowComment = true
    ): Schema {
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
                                        'table' => [
                                            'tableAddColumnBefore', 'tableAddColumnAfter', 'tableDeleteColumn',
                                            'tableAddRowBefore', 'tableAddRowAfter', 'tableDeleteRow',
                                            'tableMergeCells', 'tableSplitCell',
                                            'tableToggleHeaderRow', 'tableToggleHeaderCell',
                                            'tableDelete',
                                        ],
                                    ])
                            ]),

                        Section::make()
                            ->columns()
                            ->schema([
                                ToggleButtons::make('status')
                                    ->label('Status')
                                    ->options(function (): array {
                                        return StatusData::options(UserRole::isWriter() ? ['draft', 'pending_review'] : []);
                                    })
                                    ->inline()
                                    ->required(),

                                ToggleButtons::make('visibility')
                                    ->label('Visibilitas')
                                    ->options(PostVisibility::options())
                                    ->inline()
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set): void {
                                        $set('password', null);
                                    }),

                                TextInput::make('password')
                                    ->label('Kata Sandi')
                                    ->required()
                                    ->visible(fn(Get $get) => $get('visibility') === PostVisibility::PRIVATE->value)
                                    ->reactive()
                                    ->placeholder('Masukkan kata sandi')
                                    ->suffixAction(
                                        Action::make('generateToken')
                                            ->icon(Phosphor::Lock)
                                            ->tooltip('Buat Kata Sandi')
                                            ->action(function ($set) {
                                                $set('password', Str::random(6));
                                            })
                                    )
                            ])
                    ]),

                Group::make()
                    ->columnSpan(['lg' => 1])
                    ->schema([
                        Section::make()
                            ->schema([
                                Select::make('institution_id')
                                    ->label('Lembaga')
                                    ->options(fn(InstitutionRepository $repository): array => $repository->options())
                                    ->native(false),

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
                                    })
                                    ->visible($useCategory),

                                TagsInput::make('tags')
                                    ->label('Tag')
                                    ->placeholder('Masukkan tag')
                                    ->splitKeys(['Tab', ' '])
                                    ->visible($useTag),

                                Radio::make('allow_comment')
                                    ->label('Izinkan Komentar')
                                    ->boolean()
                                    ->inline()
                                    ->required()
                                    ->visible($useAllowComment)
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
