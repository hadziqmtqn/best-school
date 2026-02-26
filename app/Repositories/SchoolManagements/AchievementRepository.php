<?php

namespace App\Repositories\SchoolManagements;

use App\Enums\AchievementLevel;
use App\Models\Achievement;

class AchievementRepository
{
    public function total(): int
    {
        return Achievement::query()
            ->where('achievement_level', AchievementLevel::NASIONAL->value)
            ->count();
    }
}
