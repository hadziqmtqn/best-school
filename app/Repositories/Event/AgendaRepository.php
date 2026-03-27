<?php

namespace App\Repositories\Event;

use App\Enums\StatusData;
use App\Models\Agenda;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use LaravelIdea\Helper\App\Models\_IH_Agenda_QB;

class AgendaRepository
{
    public function index(?bool $isPaginate = false, ?int $limit = 3, ?array $request = []): _IH_Agenda_QB|Collection|LengthAwarePaginator
    {
        $agenda = Agenda::query()
            ->with('institution:id,name')
            ->filterByStatus(StatusData::PUBLISHED->value)
            ->filterData($request)
            ->latest();

        if ($isPaginate) {
            return $agenda->paginate(7)
                ->withQueryString();
        }else {
            return $agenda->limit($limit)
                ->get();
        }
    }
}
