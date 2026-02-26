<?php

namespace App\Repositories\References;

use App\Enums\AchievementLevel;
use App\Models\Achievement;

class SelectAchievementLevel
{
    public static function option(): array
    {
        return collect(AchievementLevel::options())
            ->mapWithKeys(fn($item) => [$item => $item])
            ->toArray();
    }

    public static function yearOption(): array
    {
        return Achievement::query()
            ->select('year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year')
            ->mapWithKeys(fn($year) => [$year => $year])
            ->toArray();
    }
}
