<?php

namespace App\Services\Reference;

use Illuminate\Support\Carbon;

class YearMonthService
{
    public function years(?int $firstYear = 2020, ?int $lastYear = null): array
    {
        return collect(range($firstYear, ($lastYear ?? now()->year)))
            ->mapWithKeys(fn($year) => [$year => $year])
            ->toArray();
    }

    public function months(): array
    {
        return collect(range(1, 12))
            ->mapWithKeys(function ($month) {
                $now = Carbon::now();
                return [$month => Carbon::createFromDate($now->year, $month)
                    ->isoFormat('MMMM')];
            })
            ->toArray();
    }
}
