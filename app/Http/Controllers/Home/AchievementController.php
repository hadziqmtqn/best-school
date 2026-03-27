<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\SchoolManagements\AchievementRepository;
use Illuminate\View\View;

class AchievementController extends Controller
{
    protected AchievementRepository $achievementRepository;

    /**
     * @param AchievementRepository $achievementRepository
     */
    public function __construct(AchievementRepository $achievementRepository)
    {
        $this->achievementRepository = $achievementRepository;
    }

    public function index(): View
    {
        $title = 'Prestasi';
        $achievements = $this->achievementRepository->index();

        return \view('home.achievement.index', compact('title', 'achievements'));
    }
}
