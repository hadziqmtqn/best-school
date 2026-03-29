<?php

namespace App\Repositories\Event;

use App\Enums\StatusData;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelIdea\Helper\App\Models\_IH_Announcement_C;

class AnnouncementRepository
{
    public function index(Request $request): _IH_Announcement_C|array|LengthAwarePaginator|AbstractPaginator
    {
        return Announcement::query()
            ->with('institution:id,name')
            ->searchData($request->input('search'))
            ->filterByStatus(StatusData::PUBLISHED->value)
            ->paginate(10)
            ->withQueryString();
    }
}
