<?php

namespace App\Navigations;

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
                    ->label('Pengaturan')
                    ->icon(Phosphor::Gear)
                    ->items([
                        ...self::filterResourceNavigationItems(RoleResource::class)
                    ])
            ]);
    }

    static function filterResourceNavigationItems($resource) {
        if (auth()->user()->can("ViewAny:" . class_basename($resource::getModel()))) {
            return $resource::getNavigationItems();
        }

        return [];
    }
}