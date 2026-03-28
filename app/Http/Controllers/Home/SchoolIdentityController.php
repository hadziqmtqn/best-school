<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\SchoolIdentityRequest;
use App\Models\Institution;
use App\Repositories\SchoolManagements\InstitutionRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class SchoolIdentityController extends Controller
{
    protected InstitutionRepository $institutionRepository;

    /**
     * @param InstitutionRepository $institutionRepository
     */
    public function __construct(InstitutionRepository $institutionRepository)
    {
        $this->institutionRepository = $institutionRepository;
    }

    public function index(SchoolIdentityRequest $request): View
    {
        $title = 'Identitas Sekolah';
        $currentInstitution = Institution::query()
            ->when($request->input('institution'), function (Builder $query) use ($request) {
                $query->filterBySlug($request->input('institution'));
            })
            ->first();
        $institutions = Institution::all();
        $schoolIdentity = $this->institutionRepository->identity($currentInstitution);

        return \view('home.school-identity.index', compact('title', 'currentInstitution', 'institutions', 'schoolIdentity'));
    }
}
