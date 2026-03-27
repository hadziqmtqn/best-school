<?php

namespace App\View\Components\Home;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BreadCrumb extends Component
{
    public ?string $title;
    public ?string $name;
    public ?string $description;

    /**
     * @param string|null $title
     * @param string|null $name
     * @param string|null $description
     */
    public function __construct(?string $title, ?string $name, ?string $description)
    {
        $this->title = $title;
        $this->name = $name;
        $this->description = $description;
    }

    public function render(): View
    {
        return view('components.home.bread-crumb');
    }
}
