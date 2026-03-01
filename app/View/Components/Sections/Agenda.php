<?php

namespace App\View\Components\Sections;

use App\Repositories\Event\AgendaRepository;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Agenda extends Component
{
    protected AgendaRepository $agendaRepository;

    /**
     * @param AgendaRepository $agendaRepository
     */
    public function __construct(AgendaRepository $agendaRepository)
    {
        $this->agendaRepository = $agendaRepository;
    }

    public function render(): View
    {
        return view('components.sections.agenda', [
            'agendas' => $this->agendaRepository->index()
        ]);
    }
}
