<?php

namespace Database\Seeders\Setting;

use App\Enums\NavigationCategory;
use App\Models\Navigation;
use App\Repositories\Settings\SubNavigationRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NavigationSeeder extends Seeder
{
    protected SubNavigationRepository $subNavigationRepository;

    /**
     * @param SubNavigationRepository $subNavigationRepository
     */
    public function __construct(SubNavigationRepository $subNavigationRepository)
    {
        $this->subNavigationRepository = $subNavigationRepository;
    }

    public function run(): void
    {
        $this->create(
            category: NavigationCategory::SCHOOL_IDENTITY->value,
            name: NavigationCategory::SCHOOL_IDENTITY->getLabel()
        );

        $this->create(
            category: null,
            name: 'Program',
            hasSubNavigation: true,
            subNavCategories: [
                [
                    'name' => NavigationCategory::EXTRACURICULAR->getLabel(),
                    'category' => null,
                    'url' => '#',
                    'openInNewTab' => false
                ],
                [
                    'name' => NavigationCategory::ACHIEVEMENT->getLabel(),
                    'category' => null,
                    'url' => '#',
                    'openInNewTab' => false
                ]
            ]
        );

        $this->create(
            category: null,
            name: 'Galeri',
            hasSubNavigation: true,
            subNavCategories: [
                [
                    'name' => NavigationCategory::PHOTO->getLabel(),
                    'category' => null,
                    'url' => '#',
                    'openInNewTab' => false
                ],
                [
                    'name' => NavigationCategory::VIDEO->getLabel(),
                    'category' => null,
                    'url' => '#',
                    'openInNewTab' => false
                ]
            ]
        );

        $this->create(
            category: null,
            name: 'Acara',
            hasSubNavigation: true,
            subNavCategories: [
                [
                    'name' => NavigationCategory::AGENDA->getLabel(),
                    'category' => null,
                    'url' => '/agenda',
                    'openInNewTab' => false
                ],
                [
                    'name' => NavigationCategory::ANNOUNCEMENT->getLabel(),
                    'category' => null,
                    'url' => '#',
                    'openInNewTab' => false
                ],
            ]
        );

        $this->create(
            category: null,
            name: 'SPMB Online',
            url: 'https://ppdb.bkn.my.id',
            openNewTab: true
        );
    }

    private function create(
        $category,
        $name,
        $url = null,
        $openNewTab = false,
        $hasSubNavigation = false,
        array $subNavCategories = null
    ): void {
        $navigation = Navigation::create([
            'slug' => Str::uuid()->toString(),
            'serial_number' => Navigation::max('serial_number') + 1,
            'name' => $name,
            'category' => $category,
            'url' => $url,
            'open_new_tab' => $openNewTab
        ]);

        if ($hasSubNavigation && count($subNavCategories) > 0) {
            foreach ($subNavCategories as $subNavCategory) {
                $this->subNavigationRepository->subNavigation(
                    navigationId: $navigation->id,
                    name: $subNavCategory['name'],
                    category: $subNavCategory['category'],
                    url: $subNavCategory['url'],
                    openInNewTab: $subNavCategory['openInNewTab']
                );
            }
        }
    }
}
