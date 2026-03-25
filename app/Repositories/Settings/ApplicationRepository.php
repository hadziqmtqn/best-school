<?php

namespace App\Repositories\Settings;

use App\Models\Application;
use App\Repositories\SchoolManagements\AchievementRepository;
use App\Repositories\SchoolManagements\EmployeeRepository;
use App\Repositories\SchoolManagements\NumberOfStudentRepository;
use App\Utilities\ThemeColor;

class ApplicationRepository
{
    protected AchievementRepository $achievementRepository;
    protected NumberOfStudentRepository $numberOfStudentRepository;
    protected EmployeeRepository $employeeRepository;

    /**
     * @param AchievementRepository $achievementRepository
     * @param NumberOfStudentRepository $numberOfStudentRepository
     * @param EmployeeRepository $employeeRepository
     */
    public function __construct(AchievementRepository $achievementRepository, NumberOfStudentRepository $numberOfStudentRepository, EmployeeRepository $employeeRepository)
    {
        $this->achievementRepository = $achievementRepository;
        $this->numberOfStudentRepository = $numberOfStudentRepository;
        $this->employeeRepository = $employeeRepository;
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
            'address' => $application?->address,
            'breadcrumbImg' => $application?->breadcrumb,
            'bannerImg' => $application?->banner_image,
            'themeColors' => ThemeColor::getCombination($application?->theme_color),
            'accreditationScore' => $application?->more_info['accreditation_score'] ?? null,
            'accreditationName' => $application?->more_info['accreditation_name'] ?? null,
            'totalAchievement' => $this->achievementRepository->total(),
            'totalStudents' => $this->numberOfStudentRepository->totalStudents(),
            'totalClassrooms' => $this->numberOfStudentRepository->totalClassrooms(),
            'totalEmployees' => $this->employeeRepository->totalActiveEmployees(),
            'ctaTitle' => $application?->more_info['cta_title'] ?? null,
            'ctaDescription' => $application?->more_info['cta_description'] ?? null,
            'ctaUrl' => $application?->more_info['cta_url'] ?? '#',
            'ctaBtnLabel' => $application?->more_info['cta_btn_label'] ?? 'Daftar Sekarang',
        ];
    }
}
