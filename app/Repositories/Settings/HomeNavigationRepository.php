<?php

namespace App\Repositories\Settings;

use App\Models\Navigation;
use App\Models\SubNavigation;

class HomeNavigationRepository
{
    public static function index(): array
    {
        return Navigation::with([
            'post',
            'subNavigations' => fn($query) => $query->orderBy('serial_number'),
            'subNavigations.post'
        ])
            ->orderBy('serial_number')
            ->get()
            ->map(function (Navigation $navigation) {
                return [
                    'name' => $navigation->name,
                    'category' => $navigation->category,
                    'pageUrl' => $navigation->post_id ? route('page.show', $navigation->post) : null,
                    'pageSlug' => $navigation->post?->slug,
                    'url' => $navigation->url,
                    'openInNewTab' => $navigation->open_new_tab,
                    'subNavigations' => $navigation->subNavigations->map(function (SubNavigation $subNavigation) {
                        return [
                            'name' => $subNavigation->name,
                            'category' => $subNavigation->category,
                            'pageUrl' => $subNavigation->post_id ? route('page.show', $subNavigation->post) : null,
                            'pageSlug' => $subNavigation->post?->slug,
                            'url' => $subNavigation->url,
                            'openInNewTab' => $subNavigation->open_new_tab
                        ];
                    })->toArray()
                ];
            })
            ->toArray();
    }
}