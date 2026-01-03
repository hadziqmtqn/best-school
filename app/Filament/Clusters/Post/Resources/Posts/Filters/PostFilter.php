<?php

namespace App\Filament\Clusters\Post\Resources\Posts\Filters;

use App\Enums\PostVisibility;
use App\Enums\StatusData;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\FusedGroup;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;

class PostFilter
{
    public static function schemas(): array
    {
        return [
            SelectFilter::make('status')
                ->label('Status')
                ->options(StatusData::options(['published', 'draft', 'pending_review']))
                ->native(false),

            Filter::make('visibility')
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
                            ->formatStateUsing(function ($state, callable $set): void {

                            }),

                        DatePicker::make('end_date')
                            ->label('Sampai')
                            ->date()
                            ->native(false)
                            ->closeOnDateSelection(),
                    ])
                        ->label('Tanggal')
                        ->columns()
                ])
                ->query(function (Builder $query, array $data): Builder {
                    $query->when($data['visibility'], fn (Builder $query, $visibility): Builder => $query->where('visibility', $visibility));
                    //$query->when($data['created_at'], fn (Builder $query, $visibility): Builder => $query->whereDate('visibility', $visibility));

                    return $query;
                })
                ->indicateUsing(function (array $data): ?string {
                    if (! $data['visibility']) {
                        return null;
                    }

                    return 'Visibilitas: ' . PostVisibility::tryFrom($data['visibility'])?->getLabel();
                }),

            TrashedFilter::make()
                ->native(false)
        ];
    }
}