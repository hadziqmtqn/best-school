<?php

namespace App\View\Components\Home;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BreadCrumb extends Component
{
    public ?string $title;

    /**
     * @param string|null $title
     */
    public function __construct(?string $title)
    {
        $this->title = $title;
    }

    public function render(): View
    {
        return view('components.home.bread-crumb');
    }
}
