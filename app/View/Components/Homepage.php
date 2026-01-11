<?php

namespace App\View\Components;

use App\Enums\Theme;
use App\Models\Application;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Homepage extends Component
{
    public function render(): View
    {
        $theme = Theme::tryFrom(Application::first()?->theme)?->value ?? 'theme_1';

        $view = "components.home.$theme.index";

        if (! view()->exists($view)) {
            $view = 'components.home.theme_1.index';
        }

        return view($view);
    }
}
