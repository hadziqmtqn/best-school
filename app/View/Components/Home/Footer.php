<?php

namespace App\View\Components\Home;

use App\Enums\Theme;
use App\Models\Application;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public function render(): View
    {
        $view = "components.home." . (Theme::tryFrom(Application::first()?->theme)?->value ?? 'theme_1') . ".footer";

        if (! view()->exists($view)) {
            $view = 'components.home.theme_1.footer';
        }

        return view($view);
    }
}
