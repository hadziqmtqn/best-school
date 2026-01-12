<?php

namespace App\Navigations;

use App\Filament\Clusters\Event\Resources\Agendas\AgendaResource;
use App\Filament\Clusters\Event\Resources\Announcements\AnnouncementResource;
use App\Filament\Clusters\Event\Resources\Galleries\GalleryResource;
use App\Filament\Clusters\Post\Resources\LeadershipGreetings\LeadershipGreetingResource;
use App\Filament\Clusters\Post\Resources\Pages\PageResource;
use App\Filament\Clusters\Post\Resources\PostCategories\PostCategoryResource;
use App\Filament\Clusters\Post\Resources\Posts\PostResource;
use App\Filament\Clusters\Reference\ReferenceCluster;
use App\Filament\Clusters\SchoolManagement\Resources\Achievements\AchievementResource;
use App\Filament\Clusters\SchoolManagement\Resources\Employees\EmployeeResource;
use App\Filament\Clusters\SchoolManagement\Resources\Extracurriculars\ExtracurricularResource;
use App\Filament\Clusters\SchoolManagement\Resources\Facilities\FacilityResource;
use App\Filament\Clusters\SchoolManagement\Resources\Institutions\InstitutionResource;
use App\Filament\Clusters\SchoolManagement\Resources\NumberOfStudents\NumberOfStudentResource;
use App\Filament\Clusters\Setting\Resources\Admins\AdminResource;
use App\Filament\Clusters\Setting\Resources\Applications\ApplicationResource;
use App\Helpers\CanAccess;
use BezhanSalleh\FilamentShield\Resources\Roles\RoleResource;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Pages\Dashboard;
use ToneGabes\Filament\Icons\Enums\Phosphor;

class PanelNavigation
{
    public static function menus(NavigationBuilder $navigationBuilder): NavigationBuilder
    {
        return $navigationBuilder
            ->items([
                ...Dashboard::getNavigationItems()
            ])
            ->groups([
                NavigationGroup::make()
                    ->label('Post')
                    ->icon(Phosphor::Note)
                    ->items([
                        ...self::filterResourceNavigationItems(PostResource::class),
                        ...self::filterResourceNavigationItems(PostCategoryResource::class),
                        ...self::filterResourceNavigationItems(PageResource::class),
                        ...self::filterResourceNavigationItems(LeadershipGreetingResource::class),
                    ]),

                NavigationGroup::make()
                    ->label('Manajemen')
                    ->icon(Phosphor::GraduationCap)
                    ->items([
                        ...self::filterResourceNavigationItems(InstitutionResource::class),
                        ...self::filterCustomResourceNavigationItems(EmployeeResource::class, 'ViewAnyEmployee'),
                        ...self::filterResourceNavigationItems(FacilityResource::class),
                        ...self::filterResourceNavigationItems(ExtracurricularResource::class),
                        ...self::filterResourceNavigationItems(NumberOfStudentResource::class),
                        ...self::filterResourceNavigationItems(AchievementResource::class),
                    ]),

                NavigationGroup::make()
                    ->label('Event')
                    ->icon(Phosphor::CalendarCheck)
                    ->items([
                        ...self::filterResourceNavigationItems(AgendaResource::class),
                        ...self::filterResourceNavigationItems(AnnouncementResource::class),
                        ...self::filterResourceNavigationItems(GalleryResource::class),
                    ]),

                NavigationGroup::make()
                    ->label('Pengaturan')
                    ->icon(Phosphor::Gear)
                    ->items([
                        ...self::filterResourceNavigationItems(ApplicationResource::class),
                        ...self::filterResourceNavigationItems(RoleResource::class),
                        ...self::filterCustomResourceNavigationItems(AdminResource::class, 'ViewAnyAdmin'),
                        ...self::filterClusterNavigationItems(ReferenceCluster::class)
                    ]),
            ]);
    }

    static function filterResourceNavigationItems($resource) {
        if (CanAccess::to('ViewAny:' . class_basename($resource::getModel()))) {
            return $resource::getNavigationItems();
        }

        return [];
    }

    static function filterCustomResourceNavigationItems($resource, $permission)
    {
        if (CanAccess::to($permission)) {
            return $resource::getNavigationItems();
        }

        return [];
    }

    static function filterClusterNavigationItems($clusterClass)
    {
        if (CanAccess::to('View:' . class_basename($clusterClass))) {
            return $clusterClass::getNavigationItems();
        }

        return [];
    }
}