<?php

namespace App\Providers;

use App\Repositories\Event\AgendaRepository;
use App\Repositories\Posts\LeadershipGreetingRepository;
use App\Repositories\Posts\NavigationPageRepository;
use App\Repositories\References\EducationalLevelRepository;
use App\Repositories\References\PersonnelDepartmentRepository;
use App\Repositories\References\SelectAchievementLevelRepository;
use App\Repositories\SchoolManagements\AchievementRepository;
use App\Repositories\SchoolManagements\EmployeePositionRepository;
use App\Repositories\SchoolManagements\EmployeeRepository;
use App\Repositories\SchoolManagements\ExtracurricularRepository;
use App\Repositories\SchoolManagements\InstitutionRepository;
use App\Repositories\SchoolManagements\NumberOfStudentRepository;
use App\Repositories\SchoolManagements\SchoolYearRepository;
use App\Repositories\Settings\ApplicationRepository;
use App\Repositories\Settings\HomeNavigationRepository;
use App\Repositories\Settings\SubNavigationRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // EVENT
        $this->app->bind(AgendaRepository::class, AgendaRepository::class);

        // POSTS
        $this->app->bind(LeadershipGreetingRepository::class, LeadershipGreetingRepository::class);
        $this->app->bind(NavigationPageRepository::class, NavigationPageRepository::class);

        // REFERENCES
        $this->app->bind(EducationalLevelRepository::class, EducationalLevelRepository::class);
        $this->app->bind(PersonnelDepartmentRepository::class, PersonnelDepartmentRepository::class);
        $this->app->bind(SelectAchievementLevelRepository::class, SelectAchievementLevelRepository::class);

        // SCHOOL MANAGEMENTS
        $this->app->bind(AchievementRepository::class, AchievementRepository::class);
        $this->app->bind(EmployeePositionRepository::class, EmployeePositionRepository::class);
        $this->app->bind(EmployeeRepository::class, EmployeeRepository::class);
        $this->app->bind(ExtracurricularRepository::class, ExtracurricularRepository::class);
        $this->app->bind(InstitutionRepository::class, InstitutionRepository::class);
        $this->app->bind(NumberOfStudentRepository::class, NumberOfStudentRepository::class);
        $this->app->bind(SchoolYearRepository::class, SchoolYearRepository::class);

        // SETTINGS
        $this->app->bind(ApplicationRepository::class, ApplicationRepository::class);
        $this->app->bind(HomeNavigationRepository::class, HomeNavigationRepository::class);
        $this->app->bind(SubNavigationRepository::class, SubNavigationRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
