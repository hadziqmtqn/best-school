<?php

namespace App\View\Components\Component;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WidgetCta extends Component
{
    public function render(): View
    {
        return view('components.component.widget-cta');
    }
}
