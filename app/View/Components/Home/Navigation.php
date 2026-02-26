<?php

namespace App\View\Components\Home;

use AllowDynamicProperties;
use App\Repositories\Settings\HomeNavigationRepository;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

#[AllowDynamicProperties]
class Navigation extends Component
{
    public function __construct(HomeNavigationRepository $homeNavigationRepository)
    {
        $this->homeNavigationRepository = $homeNavigationRepository;
    }

    public function render(): View
    {
        $navigations = $this->homeNavigationRepository->index();

        return view('components.home.navigation', compact('navigations'));
    }
}
