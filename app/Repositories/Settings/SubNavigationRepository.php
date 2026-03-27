<?php

namespace App\Repositories\Settings;

use App\Models\SubNavigation;
use Illuminate\Support\Str;

class SubNavigationRepository
{
    public function subNavigation(
        int $navigationId,
        string $name,
        ?string $category = null,
        ?string $pageId = null,
        ?string $url = null,
        ?bool $openInNewTab = false
    ): void {
        $subNavigation = new SubNavigation();
        $subNavigation->slug = Str::uuid()->toString();
        $subNavigation->serial_number = SubNavigation::max('serial_number') + 1;
        $subNavigation->navigation_id = $navigationId;
        $subNavigation->category = $category;
        $subNavigation->name = $name;
        $subNavigation->post_id = $pageId;
        $subNavigation->url = $url;
        $subNavigation->open_new_tab = $openInNewTab;
        $subNavigation->save();
    }
}
