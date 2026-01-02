<?php

namespace App\Navigations;

use App\Filament\Clusters\Reference\ReferenceCluster;
use App\Filament\Clusters\SchoolManagement\Resources\Institutions\InstitutionResource;
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
                    ->label('Manajemen')
                    ->icon(Phosphor::GraduationCap)
                    ->items([
                        ...self::filterResourceNavigationItems(InstitutionResource::class),
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