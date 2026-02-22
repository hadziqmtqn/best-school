<?php

namespace App\View\Components\Sections;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PrincipalGreeting extends Component
{
    public function render(): View
    {
        return view('components.sections.principal-greeting');
    }
}
