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
                $mainNavUrl = $navigation->post_id ? route('page', $navigation->post) : null;
                $url =$navigation->url;
                $currentUrl = url()->current();

                // 1. Map dulu sub-navigasinya agar kita punya datanya
                $mappedSubNavs = $navigation->subNavigations->map(function (SubNavigation $subNavigation) use ($currentUrl) {
                    $subUrl = $subNavigation->post_id ? route('page', $subNavigation->post) : null;
                    $url =$subNavigation->url;

                    return [
                        'name' => $subNavigation->name,
                        'category' => $subNavigation->category,
                        'pageUrl' => $subUrl,
                        'pageSlug' => $subNavigation->post?->slug,
                        'url' => $url,
                        'openInNewTab' => $subNavigation->open_new_tab,
                        'activeUrl' => $currentUrl === $subUrl || $currentUrl === url($url),
                    ];
                });

                // 2. Cek apakah link utama aktif ATAU ada salah satu sub-nav yang aktif
                $isParentActive = ($currentUrl === $mainNavUrl || $currentUrl === url($url));
                $isAnySubActive = $mappedSubNavs->contains('activeUrl', true);

                return [
                    'name' => $navigation->name,
                    'category' => $navigation->category,
                    'pageUrl' => $mainNavUrl,
                    'pageSlug' => $navigation->post?->slug,
                    'url' => $url,
                    'openInNewTab' => $navigation->open_new_tab,
                    // Sekarang activeUrl akan true jika dirinya sendiri aktif ATAU sub-nya aktif
                    'activeUrl' => $isParentActive || $isAnySubActive,
                    'subNavigations' => $mappedSubNavs->toArray()
                ];
            })
            ->toArray();
    }
}
