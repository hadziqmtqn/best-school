<?php

namespace App\View\Components\Home;

use App\Enums\Theme;
use App\Models\Application;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MobileHeader extends Component
{
    public function render(): View
    {
        $theme = Theme::tryFrom(Application::first()?->theme)?->value ?? 'theme_1';

        $view = "components.home.$theme.mobile_header";

        if (! view()->exists($view)) {
            $view = 'components.home.theme_1.mobile_header';
        }

        return view($view);
    }
}
