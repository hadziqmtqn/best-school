<?php

namespace App\View\Components\Home;

use App\Repositories\Settings\HomeNavigationRepository;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navigation extends Component
{
    public function render(): View
    {
        $navigations = HomeNavigationRepository::index();

        return view('components.home.navigation', compact('navigations'));
    }
}
