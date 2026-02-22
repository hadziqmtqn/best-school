<?php

namespace App\View\Components\Sections;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Agenda extends Component
{
    public function render(): View
    {
        return view('components.sections.agenda');
    }
}
