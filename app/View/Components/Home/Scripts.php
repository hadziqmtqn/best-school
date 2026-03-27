<?php

namespace App\View\Components\Home;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Scripts extends Component
{
    public function render(): View
    {
        return view('components.home.scripts');
    }
}
