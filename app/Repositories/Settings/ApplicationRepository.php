<?php

namespace App\Repositories\Settings;

use App\Models\Application;
use App\Repositories\SchoolManagements\AchievementRepository;
use App\Repositories\SchoolManagements\NumberOfStudentRepository;
use App\Utilities\ThemeColor;

class ApplicationRepository
{
    protected AchievementRepository $achievementRepository;
    protected NumberOfStudentRepository $numberOfStudentRepository;

    /**
     * @param AchievementRepository $achievementRepository
     * @param NumberOfStudentRepository $numberOfStudentRepository
     */
    public function __construct(AchievementRepository $achievementRepository, NumberOfStudentRepository $numberOfStudentRepository)
    {
        $this->achievementRepository = $achievementRepository;
        $this->numberOfStudentRepository = $numberOfStudentRepository;
    }

    public function index(): array
    {
        $application = Application::first();

        return [
            'name' => $application?->name,
            'shortName' => $application?->short_name,
            'motto' => $application?->motto,
            'description' => $application?->description,
            'logo' => $application?->logo,
            'phoneNumber' => $application?->phone_number,
            'email' => $application?->email,
            'breadcrumbImg' => $application?->breadcrumb,
            'bannerImg' => $application?->banner_image,
            'themeColors' => ThemeColor::getCombination($application?->theme_color),
            'accreditationScore' => $application?->more_info['accreditation_score'] ?? null,
            'accreditationName' => $application?->more_info['accreditation_name'] ?? null,
            'totalAchievement' => $this->achievementRepository->total(),
            'totalStudents' => $this->numberOfStudentRepository->total()
        ];
    }
}
