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
                NavigationCategory::EXTRACURICULAR->value,
                NavigationCategory::ACHIEVEMeENT->value
            ]
        );

        $this->create(
            category: null,
            name: 'Galeri',
            hasSubNavigation: true,
            subNavCategories: [
                NavigationCategory::PHOTO->value,
                NavigationCategory::VIDEO->value
            ]
        );

        $this->create(
            category: null,
            name: 'Acara',
            hasSubNavigation: true,
            subNavCategories: [
                NavigationCategory::AGENDA->value,
                NavigationCategory::ANNOUNCEMENT->value
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
                    title: NavigationCategory::tryFrom($subNavCategory)->getLabel(),
                    category: $subNavCategory
                );
            }
        }
    }
}
