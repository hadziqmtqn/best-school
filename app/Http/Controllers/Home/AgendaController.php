<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\AgendaRequest;
use App\Models\Agenda;
use App\Repositories\Event\AgendaRepository;
use App\Services\Reference\YearMonthService;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class AgendaController extends Controller
{
    protected AgendaRepository $agendaRepository;
    protected YearMonthService $yearMonthService;

    /**
     * @param AgendaRepository $agendaRepository
     * @param YearMonthService $yearMonthService
     */
    public function __construct(AgendaRepository $agendaRepository, YearMonthService $yearMonthService)
    {
        $this->agendaRepository = $agendaRepository;
        $this->yearMonthService = $yearMonthService;
    }

    public function index(AgendaRequest $request): View
    {
        $title = 'Agenda';
        $agendas = $this->agendaRepository->index(
            isPaginate: true,
            request: $request->all()
        );

        $firstYearAgenda = Agenda::oldest('start_date')
            ->first();

        $years = $this->yearMonthService->years(
            firstYear: $firstYearAgenda ? Carbon::parse($firstYearAgenda->start_date)->year : null
        );

        $months = $this->yearMonthService->months();

        return \view('home.agenda.index', compact('title', 'agendas', 'years', 'months'));
    }
}
