<?php

namespace App\Repositories\SchoolManagements;

use App\Enums\AchievementLevel;
use App\Models\Achievement;
use App\Models\Institution;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelIdea\Helper\App\Models\_IH_Achievement_C;

class AchievementRepository
{
    public function total(): int
    {
        return Achievement::query()
            ->where('achievement_level', AchievementLevel::NASIONAL->value)
            ->count();
    }

    public function index(Institution $institution, ?int $perPage = 10): LengthAwarePaginator|_IH_Achievement_C|AbstractPaginator
    {
        return Achievement::query()
            ->with('institution:id,name')
            ->institutionId($institution->id)
            ->orderByDesc('year')
            ->paginate($perPage, ['*'], 'achievement_page')
            ->withQueryString();
    }
}
