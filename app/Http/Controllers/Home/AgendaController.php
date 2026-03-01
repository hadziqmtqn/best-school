<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\AgendaRequest;
use App\Repositories\Event\AgendaRepository;
use Illuminate\View\View;

class AgendaController extends Controller
{
    protected AgendaRepository $agendaRepository;

    /**
     * @param AgendaRepository $agendaRepository
     */
    public function __construct(AgendaRepository $agendaRepository)
    {
        $this->agendaRepository = $agendaRepository;
    }

    public function index(AgendaRequest $request): View
    {
        $title = 'Agenda';
        $agendas = $this->agendaRepository->index(
            isPaginate: true,
            request: $request->all()
        );

        return \view('home.agenda.index', compact('title', 'agendas'));
    }
}
