<?php

namespace App\View\Components\Sections;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Cta extends Component
{
    public function render(): View
    {
        return view('components.sections.cta');
    }
}
