<?php

namespace App\Repositories\Settings;

use App\Models\SubNavigation;
use Illuminate\Support\Str;

class SubNavigationRepository
{
    public static function subNavigation($navigationId, $title, $category = null, $pageId = null): void
    {
        $subNavigation = new SubNavigation();
        $subNavigation->slug = Str::uuid()->toString();
        $subNavigation->serial_number = SubNavigation::max('serial_number') + 1;
        $subNavigation->navigation_id = $navigationId;
        $subNavigation->category = $category;
        $subNavigation->name = $title;
        $subNavigation->post_id = $pageId;
        $subNavigation->save();
    }
}
