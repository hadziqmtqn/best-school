<?php

namespace App\View\Components\Component;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EmptyState extends Component
{
    public ?string $note = null;

    /**
     * @param string|null $note
     */
    public function __construct(?string $note)
    {
        $this->note = $note;
    }

    public function render(): View
    {
        return view('components.component.empty-state');
    }
}
