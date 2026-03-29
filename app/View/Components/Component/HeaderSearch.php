<?php

namespace App\View\Components\Component;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeaderSearch extends Component
{
    public string $title;

    /**
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function render(): View
    {
        return view('components.component.header-search');
    }
}
