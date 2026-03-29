<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\SchoolIdentityRequest;
use App\Models\Institution;
use App\Repositories\SchoolManagements\AchievementRepository;
use App\Repositories\SchoolManagements\ExtracurricularRepository;
use App\Repositories\SchoolManagements\InstitutionRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class SchoolIdentityController extends Controller
{
    protected InstitutionRepository $institutionRepository;
    protected ExtracurricularRepository $extracurricularRepository;
    protected AchievementRepository $achievementRepository;

    /**
     * @param InstitutionRepository $institutionRepository
     * @param ExtracurricularRepository $extracurricularRepository
     * @param AchievementRepository $achievementRepository
     */
    public function __construct(InstitutionRepository $institutionRepository, ExtracurricularRepository $extracurricularRepository, AchievementRepository $achievementRepository)
    {
        $this->institutionRepository = $institutionRepository;
        $this->extracurricularRepository = $extracurricularRepository;
        $this->achievementRepository = $achievementRepository;
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
        $vision = $this->institutionRepository->vision($currentInstitution);
        $extracurriculars = $this->extracurricularRepository->index($currentInstitution);
        $achievements = $this->achievementRepository->index($currentInstitution);

        return \view('home.school-identity.index', compact(
            'title',
            'currentInstitution',
            'institutions',
            'schoolIdentity',
            'vision',
            'extracurriculars',
            'achievements'
        ));
    }
}
