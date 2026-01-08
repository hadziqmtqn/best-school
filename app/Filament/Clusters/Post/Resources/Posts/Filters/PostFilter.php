<?php

namespace App\Filament\Clusters\Post\Resources\Posts\Filters;

use App\Enums\PostVisibility;
use App\Enums\StatusData;
use App\Repositories\SchoolManagements\InstitutionRepository;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class PostFilter
{
    public static function schemas(): array
    {
        return [
            SelectFilter::make('post_category_id')
                ->label('Kategori')
                ->relationship(name: 'postCategory', titleAttribute: 'name')
                ->searchable()
                ->preload()
                ->native(false),

            SelectFilter::make('institution_id')
                ->label('Lembaga')
                ->options(InstitutionRepository::options())
                ->native(false),

            SelectFilter::make('status')
                ->label('Status')
                ->options(StatusData::options(['published', 'draft', 'pending_review']))
                ->native(false),

            Filter::make('filter')
                ->columnSpanFull()
                ->schema([
                    ToggleButtons::make('visibility')
                        ->label('Visibilitas')
                        ->options(PostVisibility::options())
                        ->inline(),

                    FusedGroup::make([
                        DatePicker::make('start_date')
                            ->label('Sejak')
                            ->date()
                            ->native(false)
                            ->closeOnDateSelection()
                            ->reactive()
                            ->formatStateUsing(function ($state, callable $set, Get $get): void {
                                $endDate = $get('end_date');
                                if ($endDate) {
                                    $startDate = Carbon::parse($state);
                                    $endDate = Carbon::parse($endDate);

                                    if ($startDate->gt($endDate)) {
                                        $set('end_date', null);
                                    }
                                }
                            })
                            ->placeholder('Sejak'),

                        DatePicker::make('end_date')
                            ->label('Sampai')
                            ->date()
                            ->minDate(fn(Get $get) => $get('start_date'))
                            ->native(false)
                            ->reactive()
                            ->closeOnDateSelection()
                            ->placeholder('Sampai'),
                    ])
                        ->label('Rentang Tanggal')
                        ->columns()
                ])
                ->query(function (Builder $query, array $data): Builder {
                    $query->when($data['visibility'], fn (Builder $query, $visibility): Builder => $query->where('visibility', $visibility));

                    if ($data['start_date'] && $data['end_date']) {
                        $query->whereDate('created_at', '>=', $data['start_date']);
                        $query->whereDate('created_at', '<=', $data['end_date']);
                    }

                    return $query;
                })
                ->indicateUsing(function (array $data): array {
                    $indicators = [];

                    if ($data['visibility']) {
                        $indicators[] = 'Visibilitas: ' . PostVisibility::tryFrom($data['visibility'])?->getLabel();
                    }

                    if ($data['start_date'] && $data['end_date']) {
                        $indicators[] = 'Rentang Tanggal: ' . Carbon::parse($data['start_date'])->isoFormat('D MMM Y') . ' - ' . Carbon::parse($data['end_date'])->isoFormat('D MMM Y');
                    }

                    return $indicators;
                }),

            TrashedFilter::make()
                ->native(false)
        ];
    }
}