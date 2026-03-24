<?php

namespace App\View\Components\Component;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal1 extends Component
{
    public string $idModal;
    public string $title;

    /**
     * @param string $idModal
     * @param string $title
     */
    public function __construct(string $idModal, string $title)
    {
        $this->idModal = $idModal;
        $this->title = $title;
    }

    public function render(): View
    {
        return view('components.component.modal1');
    }
}
